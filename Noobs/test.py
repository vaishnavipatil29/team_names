import os
import xlrd

loc = os.path.join(os.path.dirname(os.path.dirname(__file__)),'1.xlsx')
wb = xlrd.open_workbook(loc)
sheet = wb.sheet_by_index(0)
data = [[sheet.cell_value(r,c) for c in range(sheet.ncols)] for r in range(sheet.nrows)]
for row in data:
    for col in row:
        if col == '':
            col = "Absent"

i = 1
for x in data:
    x.insert(0, i)
    i += 1
new_col = [0]
for j in range(len(data[0])):
        new_col.append(j + 1)
data.insert(0, new_col)

print(data)