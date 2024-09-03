import os
import sys
import requests
import pandas as pd

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

# Inisialisasi list untuk dataset yang berbeda
data_ova = []
data_teaching = []
data_research = []
data_int_outlook = []
data_income = []
data_citation = []
data_campus_info = []
no = 0

# Memproses data yang diambil
for i in range(len(rows)):
    no += 1
    rank = rows[i].get('rank', "data tidak ditemukan pada sumber")
    name = rows[i].get('name', "data tidak ditemukan pada sumber")
    location = rows[i].get('location', "data tidak ditemukan pada sumber")
    ova = rows[i].get('scores_overall', "data tidak ditemukan pada sumber")
    teaching = rows[i].get('scores_teaching', "data tidak ditemukan pada sumber")
    rank_teaching = rows[i].get('scores_teaching_rank', "data tidak ditemukan pada sumber")
    research = rows[i].get('scores_research', "data tidak ditemukan pada sumber")
    rank_research = rows[i].get('scores_research_rank', "data tidak ditemukan pada sumber")
    citation = rows[i].get('scores_citations', "data tidak ditemukan pada sumber")
    rank_citation = rows[i].get('scores_citations_rank', "data tidak ditemukan pada sumber")
    income = rows[i].get('scores_industry_income', "data tidak ditemukan pada sumber")
    rank_income = rows[i].get('scores_industry_income_rank', "data tidak ditemukan pada sumber")
    intl = rows[i].get('scores_international_outlook', "data tidak ditemukan pada sumber")
    rank_intl = rows[i].get('scores_international_outlook_rank', "data tidak ditemukan pada sumber")
    number_students = rows[i].get('stats_number_students', "data tidak ditemukan pada sumber")
    student_staff_ratio = rows[i].get('stats_student_staff_ratio', "data tidak ditemukan pada sumber")
    pc_intl_students = rows[i].get('stats_pc_intl_students', "data tidak ditemukan pada sumber")
    female_male_ratio = rows[i].get('stats_female_male_ratio', "data tidak ditemukan pada sumber")

    # Menambahkan data ke list yang sesuai
    data_ova.append(
        (no, rank, name, location, ova, teaching, rank_teaching, research, rank_research, citation, rank_citation, income, rank_income, intl, rank_intl, tanggal)
    )
    data_teaching.append(
        (no, name, teaching, rank_teaching, tanggal)
    )
    data_research.append(
        (no, name, research, rank_research, tanggal)
    )
    data_int_outlook.append(
        (no, name, intl, rank_intl, tanggal)
    )
    data_income.append(
        (no, name, income, rank_income, tanggal)
    )
    data_citation.append(
        (no, name, citation, rank_citation, tanggal)
    )
    data_campus_info.append(
        (no, rank, name, location, number_students, student_staff_ratio, pc_intl_students, female_male_ratio, tanggal)
    )

# Membuat DataFrames dan menyimpannya ke file .xlsx di directory spesifik
df_ova = pd.DataFrame(data_ova, columns=['id_ova', 'wrld_rank', 'nama_univ', 'lokasi', 'score_ova', 'teaching', "rank_teaching", 'research', "rank_rsc", 'citation', "rank_ctn", 'income', "rank_inc", 'int_outlook', "rank_int_outlook", "tanggal"])
df_ova.to_excel(os.path.join(directory, f"THE_Ranking_ova_{tanggal}.xlsx"), index=False)
print(f"Overall Score data successfully saved to {os.path.join(directory, f'THE_Ranking_ova_{tanggal}.xlsx')}")

df_teaching = pd.DataFrame(data_teaching, columns=['id_teaching', 'nama_univ', 'teaching', "rank_teaching", "tanggal"])
df_teaching.to_excel(os.path.join(directory, f"THE_Ranking_teaching_{tanggal}.xlsx"), index=False)
print(f"Teaching data successfully saved to {os.path.join(directory, f'THE_Ranking_teaching_{tanggal}.xlsx')}")

df_research = pd.DataFrame(data_research, columns=['id_rsc', 'nama_univ', 'research', "rank_rsc", "tanggal"])
df_research.to_excel(os.path.join(directory, f"THE_Ranking_research_{tanggal}.xlsx"), index=False)
print(f"Research data successfully saved to {os.path.join(directory, f'THE_Ranking_research_{tanggal}.xlsx')}")

df_int_outlook = pd.DataFrame(data_int_outlook, columns=['id_int_outlook', 'nama_univ', 'int_outlook', "rank_int_outlook", "tanggal"])
df_int_outlook.to_excel(os.path.join(directory, f"THE_Ranking_int_outlook_{tanggal}.xlsx"), index=False)
print(f"International Outlook data successfully saved to {os.path.join(directory, f'THE_Ranking_int_outlook_{tanggal}.xlsx')}")

df_income = pd.DataFrame(data_income, columns=['id_inc', 'nama_univ', 'income', "rank_inc", "tanggal"])
df_income.to_excel(os.path.join(directory, f"THE_Ranking_income_{tanggal}.xlsx"), index=False)
print(f"Industry Income data successfully saved to {os.path.join(directory, f'THE_Ranking_income_{tanggal}.xlsx')}")

df_citation = pd.DataFrame(data_citation, columns=['id_ctn', 'nama_univ', 'citation', "rank_ctn", "tanggal"])
df_citation.to_excel(os.path.join(directory, f"THE_Ranking_citation_{tanggal}.xlsx"), index=False)
print(f"Citation data successfully saved to {os.path.join(directory, f'THE_Ranking_citation_{tanggal}.xlsx')}")

df_campus_info = pd.DataFrame(data_campus_info, columns=['id_info','wrld_rank', 'nama_univ', "lokasi", 'number_students', 'student_staff_ratio', 'pc_intl_students', 'female_male_ratio', "tanggal"])
df_campus_info.to_excel(os.path.join(directory, f"THE_Ranking_campus_info_{tanggal}.xlsx"), index=False)
print(f"Campus Info data successfully saved to {os.path.join(directory, f'THE_Ranking_campus_info_{tanggal}.xlsx')}")
