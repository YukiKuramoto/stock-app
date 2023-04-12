import json
import sys
import datetime as dt
import pandas_datareader.data as web

code = sys.argv[1]
start_date = sys.argv[2]
end_date = sys.argv[3]

ticker_symbol="8616"
ticker_symbol_dr=code + ".JP"
 
#データ取得
df = web.DataReader(ticker_symbol_dr, data_source='stooq', start=start_date,end=end_date)
rowNum = df.shape[0]
list = []

for index in range(rowNum):
    dict = {
        'date': df.iloc[index].name.strftime("%Y-%m-%d %H:%M:%S"),
        'open': df.iloc[index].iloc[0].item(),
        'high': df.iloc[index].iloc[1].item(),
        'low': df.iloc[index].iloc[2].item(),
        'close': df.iloc[index].iloc[3].item(),
        'volume': df.iloc[index].iloc[4].item(),
    }
    list.append(dict)

output = json.dumps(list)
print(output)