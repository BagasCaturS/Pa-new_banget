import os
import sys
import requests
import pandas as pd
import mysql.connector

# Ambil token API dan directory dari argument command line
tahun = sys.argv[1]
directory = sys.argv[2]

# Buat URL berdasarkan token yang dimasukkan
url = f"https://www.timeshighereducation.com/sites/default/files/the_data_rankings/world_university_rankings_{tahun}.json"
tanggal = url[101:105]  # Mengambil tahun dari URL

# Membuat directory jika belum ada
if not os.path.exists(directory):
    os.makedirs(directory)

# Mengatur headers untuk permintaan data
headers = {
    "accept": "application/json, text/javascript, */*; q=0.01",
    "user-agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 OPR/98.0.0.0 (Edition std-1)"
}

# Mengambil data dari URL
res = requests.get(url, headers=headers).json()
rows = res["data"]

# Koneksi ke database MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="root",        # ganti dengan username MySQL
    password="",    
    database="dummy_the3" # ganti dengan nama database MySQL
)
cursor = conn.cursor()

cursor.execute("SELECT COUNT(*) FROM campus_info WHERE tanggal = %s", (tanggal,))
year_exists = cursor.fetchone()[0]

if year_exists > 0:
    print(f"Data untuk tahun {tanggal} Sudah tersedia di database. Proses penambahan data dibatalkan.")
    cursor.close()
    conn.close()
    sys.exit(1)
# Mengambil ID terakhir dari setiap tabel yang diperlukan
cursor.execute("SELECT MAX(id_ova) FROM overall")
last_id_ova = cursor.fetchone()[0] or 0

cursor.execute("SELECT MAX(id_teaching) FROM teaching")
last_id_teaching = cursor.fetchone()[0] or 0

cursor.execute("SELECT MAX(id_rsc) FROM research")
last_id_rsc = cursor.fetchone()[0] or 0

cursor.execute("SELECT MAX(id_int_outlook) FROM international_outlook")
last_id_int_outlook = cursor.fetchone()[0] or 0

cursor.execute("SELECT MAX(id_inc) FROM industry_income")
last_id_inc = cursor.fetchone()[0] or 0

cursor.execute("SELECT MAX(id_ctn) FROM citation")
last_id_ctn = cursor.fetchone()[0] or 0

cursor.execute("SELECT MAX(id_info) FROM campus_info")
last_id_info = cursor.fetchone()[0] or 0

# Inisialisasi list untuk dataset yang berbeda
data_ova = []
data_teaching = []
data_research = []
data_int_outlook = []
data_income = []
data_citation = []
data_campus_info = []

def replace_na(value):
    # Cek apakah nilai dimulai dengan '=' dan hapus jika ada
    if isinstance(value, str) and value.startswith('='):
        value = value[1:]  # Menghapus '=' di awal string
    
    return "data tidak ditemukan pada sumber" if value in ["n/a", "0"] else value

# Memproses data yang diambil
for i in range(len(rows)):
    # Increment ID

    last_id_ova += 1
    last_id_teaching += 1
    last_id_rsc += 1
    last_id_int_outlook += 1
    last_id_inc += 1
    last_id_ctn += 1
    last_id_info += 1

    rank = replace_na(rows[i].get('rank') or "data tidak ditemukan pada sumber")
    name = replace_na(rows[i].get('name') or "data tidak ditemukan pada sumber")
    location = replace_na(rows[i].get('location') or "data tidak ditemukan pada sumber")
    ova = replace_na(rows[i].get('scores_overall') or "data tidak ditemukan pada sumber")
    teaching = replace_na(rows[i].get('scores_teaching') or "data tidak ditemukan pada sumber")
    rank_teaching = replace_na(rows[i].get('scores_teaching_rank') or "data tidak ditemukan pada sumber")
    research = replace_na(rows[i].get('scores_research') or "data tidak ditemukan pada sumber")
    rank_research = replace_na(rows[i].get('scores_research_rank') or "data tidak ditemukan pada sumber")
    citation = replace_na(rows[i].get('scores_citations') or "data tidak ditemukan pada sumber")
    rank_citation = replace_na(rows[i].get('scores_citations_rank') or "data tidak ditemukan pada sumber")
    income = replace_na(rows[i].get('scores_industry_income') or "data tidak ditemukan pada sumber")
    rank_income = replace_na(rows[i].get('scores_industry_income_rank') or "data tidak ditemukan pada sumber")
    intl = replace_na(rows[i].get('scores_international_outlook') or "data tidak ditemukan pada sumber")
    rank_intl = replace_na(rows[i].get('scores_international_outlook_rank') or "data tidak ditemukan pada sumber")
    number_students = replace_na(rows[i].get('stats_number_students') or "data tidak ditemukan pada sumber")
    student_staff_ratio = replace_na(rows[i].get('stats_student_staff_ratio') or "data tidak ditemukan pada sumber")
    pc_intl_students = replace_na(rows[i].get('stats_pc_intl_students') or "data tidak ditemukan pada sumber")
    female_male_ratio = replace_na(rows[i].get('stats_female_male_ratio') or "data tidak ditemukan pada sumber")
    stats_proportion_of_isr = replace_na(rows[i].get('stats_proportion_of_isr') or "data tidak ditemukan pada sumber")

    # Menambahkan data ke list yang sesuai
    data_ova.append(
        (last_id_ova, rank, name, location, ova, teaching, rank_teaching, research, rank_research, citation, rank_citation, income, rank_income, intl, rank_intl, tanggal, last_id_info, last_id_ctn, last_id_inc, last_id_rsc, last_id_int_outlook, last_id_teaching)
    )
    data_teaching.append(
        (last_id_teaching, name, teaching, rank_teaching, tanggal, last_id_info)
    )
    data_research.append(
        (last_id_rsc, name, research, rank_research, tanggal, last_id_info)
    )
    data_int_outlook.append(
        (last_id_int_outlook, name, intl, rank_intl, tanggal, last_id_info)
    )
    data_income.append(
        (last_id_inc, name, income, rank_income, tanggal, last_id_info)
    )
    data_citation.append(
        (last_id_ctn, name, citation, rank_citation, tanggal, last_id_info)
    )
    data_campus_info.append(
        (last_id_info, rank, name, location, number_students, student_staff_ratio, pc_intl_students, female_male_ratio, stats_proportion_of_isr, tanggal)
    )


# Membuat DataFrames dan menyimpannya ke file .xlsx di directory spesifik
df_ova = pd.DataFrame(data_ova, columns=['id_ova', 'wrld_rank', 'nama_univ', 'lokasi', 'score_ova', 'teaching', "rank_teaching", 'research', "rank_rsc", 'citation', "rank_ctn", 'income', "rank_inc", 'int_outlook', "rank_int_outlook", "tanggal", "id_info", "id_ctn", "id_inc", "id_rsc", "id_int_outlook", "id_teaching"])
df_ova.to_excel(os.path.join(directory, f"THE_Ranking_ova_{tanggal}.xlsx"), index=False)
print(f"Overall Score data successfully saved to {os.path.join(directory, f'THE_Ranking_ova_{tanggal}.xlsx')}")

df_teaching = pd.DataFrame(data_teaching, columns=['id_teaching', 'nama_univ', 'teaching', "rank_teaching", "tanggal", "id_info"])
df_teaching.to_excel(os.path.join(directory, f"THE_Ranking_teaching_{tanggal}.xlsx"), index=False)
print(f"Teaching data successfully saved to {os.path.join(directory, f'THE_Ranking_teaching_{tanggal}.xlsx')}")

df_research = pd.DataFrame(data_research, columns=['id_rsc', 'nama_univ', 'research', "rank_rsc", "tanggal", "id_info"])
df_research.to_excel(os.path.join(directory, f"THE_Ranking_research_{tanggal}.xlsx"), index=False)
print(f"Research data successfully saved to {os.path.join(directory, f'THE_Ranking_research_{tanggal}.xlsx')}")

df_int_outlook = pd.DataFrame(data_int_outlook, columns=['id_int_outlook', 'nama_univ', 'int_outlook', "rank_int_outlook", "tanggal", "id_info"])
df_int_outlook.to_excel(os.path.join(directory, f"THE_Ranking_int_outlook_{tanggal}.xlsx"), index=False)
print(f"International Outlook data successfully saved to {os.path.join(directory, f'THE_Ranking_int_outlook_{tanggal}.xlsx')}")

df_income = pd.DataFrame(data_income, columns=['id_inc', 'nama_univ', 'income', "rank_inc", "tanggal", "id_info"])
df_income.to_excel(os.path.join(directory, f"THE_Ranking_income_{tanggal}.xlsx"), index=False)
print(f"Industry Income data successfully saved to {os.path.join(directory, f'THE_Ranking_income_{tanggal}.xlsx')}")

df_citation = pd.DataFrame(data_citation, columns=['id_ctn', 'nama_univ', 'citation', "rank_ctn", "tanggal", "id_info"])
df_citation.to_excel(os.path.join(directory, f"THE_Ranking_citation_{tanggal}.xlsx"), index=False)
print(f"Citation data successfully saved to {os.path.join(directory, f'THE_Ranking_citation_{tanggal}.xlsx')}")

df_campus_info = pd.DataFrame(data_campus_info, columns=['id_info','wrld_rank', 'nama_univ', "lokasi", 'number_students', 'student_staff_ratio', 'pc_intl_students', 'female_male_ratio',"stats_proportion_of_isr", "tanggal"])
df_campus_info.to_excel(os.path.join(directory, f"THE_Ranking_campus_info_{tanggal}.xlsx"), index=False)
print(f"Campus Info data successfully saved to {os.path.join(directory, f'THE_Ranking_campus_info_{tanggal}.xlsx')}")

# Replace NaN values with a default string before inserting into the database
df_campus_info = df_campus_info.fillna("data tidak ditemukan pada sumber")
df_teaching = df_teaching.fillna("data tidak ditemukan pada sumber")
df_research = df_research.fillna("data tidak ditemukan pada sumber")
df_int_outlook = df_int_outlook.fillna("data tidak ditemukan pada sumber")
df_income = df_income.fillna("data tidak ditemukan pada sumber")
df_citation = df_citation.fillna("data tidak ditemukan pada sumber")
df_ova = df_ova.fillna("data tidak ditemukan pada sumber")


try:
    df_ova = pd.read_excel(f"{sys.argv[2]}/THE_Ranking_ova_{tanggal}.xlsx")
except FileNotFoundError as e:
    print(f"File not found: {e}")
except Exception as e:
    print(f"Error reading THE_Ranking_ova_{tanggal}.xlsx: {e}")

try:
    df_teaching = pd.read_excel(f"{sys.argv[2]}/THE_Ranking_teaching_{tanggal}.xlsx")
except FileNotFoundError as e:
    print(f"File not found: {e}")
except Exception as e:
    print(f"Error reading THE_Ranking_teaching_{tanggal}.xlsx: {e}")

try:
    df_research = pd.read_excel(f"{sys.argv[2]}/THE_Ranking_research_{tanggal}.xlsx")
except FileNotFoundError as e:
    print(f"File not found: {e}")
except Exception as e:
    print(f"Error reading THE_Ranking_research_{tanggal}.xlsx: {e}")

try:
    df_int_outlook = pd.read_excel(f"{sys.argv[2]}/THE_Ranking_int_outlook_{tanggal}.xlsx")
except FileNotFoundError as e:
    print(f"File not found: {e}")
except Exception as e:
    print(f"Error reading THE_Ranking_int_outlook_{tanggal}.xlsx: {e}")

try:
    df_income = pd.read_excel(f"{sys.argv[2]}/THE_Ranking_income_{tanggal}.xlsx")
except FileNotFoundError as e:
    print(f"File not found: {e}")
except Exception as e:
    print(f"Error reading THE_Ranking_income_{tanggal}.xlsx: {e}")

try:
    df_citation = pd.read_excel(f"{sys.argv[2]}/THE_Ranking_citation_{tanggal}.xlsx")
except FileNotFoundError as e:
    print(f"File not found: {e}")
except Exception as e:
    print(f"Error reading THE_Ranking_citation_{tanggal}.xlsx: {e}")

try:
    df_campus_info = pd.read_excel(f"{sys.argv[2]}/THE_Ranking_campus_info_{tanggal}.xlsx")
except FileNotFoundError as e:
    print(f"File not found: {e}")
except Exception as e:
    print(f"Error reading THE_Ranking_campus_info_{tanggal}.xlsx: {e}")

# Memasukkan data dari DataFrames ke tabel MySQL
def insert_data(df, table_name, columns):
    for index, row in df.iterrows():
        row = row.fillna("data tidak ditemukan pada sumber")  # Replace NaN values in each row
        placeholders = ", ".join(["%s"] * len(columns))
        columns_str = ", ".join(columns)
        sql = f"INSERT INTO {table_name} ({columns_str}) VALUES ({placeholders})"
        try:
            cursor.execute(sql, tuple(row))
            # print(f"Successfully inserted data into {table_name}")
        except mysql.connector.Error as e:
            print(f"Error inserting data into {table_name}: {e}")
        except Exception as e:
            print(f"Unexpected error: {e}")



# Memasukkan data dari file Excel ke tabel MySQL
insert_data(df_campus_info, 'campus_info', ['id_info','wrld_rank', 'nama_univ', "lokasi", 'number_students', 'student_staff_ratio', 'pc_intl_students', 'female_male_ratio',"stats_proportion_of_isr", "tanggal"])
insert_data(df_teaching, 'teaching', ['id_teaching', 'nama_univ', 'teaching', "rank_teaching", "tanggal", "id_info"])
insert_data(df_research, 'research', ['id_rsc', 'nama_univ', 'research', "rank_rsc", "tanggal", "id_info"])
insert_data(df_int_outlook, 'international_outlook', ['id_int_outlook', 'nama_univ', 'int_outlook', "rank_int_outlook", "tanggal", "id_info"])
insert_data(df_income, 'industry_income', ['id_inc', 'nama_univ', 'income', "rank_inc", "tanggal", "id_info"])
insert_data(df_citation, 'citation', ['id_ctn', 'nama_univ', 'citation', "rank_ctn", "tanggal", "id_info"])
insert_data(df_ova, 'overall', ['id_ova', 'wrld_rank', 'nama_univ', 'lokasi', 'score_ova', 'teaching', "rank_teaching", 'research', "rank_rsc", 'citation', "rank_ctn", 'income', "rank_inc", 'int_outlook', "rank_int_outlook", "tanggal", "id_info", "id_ctn", "id_inc", "id_rsc", "id_int_outlook", "id_teaching"])

# Commit dan tutup koneksi
try:
    conn.commit()
except mysql.connector.Error as e:
    print(f"Error committing transaction: {e}")
except Exception as e:
    print(f"Unexpected error: {e}")

try:
    cursor.close()
    conn.close()
except mysql.connector.Error as e:
    print(f"Error closing connection: {e}")
except Exception as e:
    print(f"Unexpected error: {e}")

