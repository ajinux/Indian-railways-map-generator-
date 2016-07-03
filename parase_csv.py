import csv

import MySQLdb

out=open("train_data.csv","rb")

data=csv.reader(out)

data=[[row[0].strip("'").strip(),row[1].strip("'").strip(),row[4].strip("'").strip(),row[5].strip("'").strip(),row[6].strip("'").strip(),row[7].strip("'").strip(),row[9].strip("'").strip(),row[11].strip("'").strip()] for row in data ]

resourse=[]
flag=0
last_train_no=0
last_dist=0
last_ETA=0

for row in data:
     train_no=row[0]
     dist=row[5]
     ETA=row[3]

     if train_no!=last_train_no:
        if flag!=0:
         resourse[len(resourse)-1].append(last_dist)
         resourse[len(resourse)-1].append(last_ETA)


     	train_no1=row[0]
     	train_name=row[1]
        source=row[2]
        destination=row[7]
        train_source=row[6]
        depature_time=row[4]
        resourse.append([train_no1,train_name,source,destination,train_source,depature_time])
        flag=1

     
     last_train_no=train_no
     last_dist=dist
     last_ETA=ETA

resourse[len(resourse)-1].append(last_dist)
resourse[len(resourse)-1].append(last_ETA)


for row in resourse:
	print row,"\n"


db=MySQLdb.connect(host="localhost",user="root",passwd="xxxx",db="Transportation")

cur=db.cursor()



flag=1

for element in resourse:
	query="insert into Train (ID,SOURCE,DESTINATION) values("+str(flag)+",'"+element[2]+"','"+element[3]+"')"

	cur.execute(query)

	query="insert into Train_details (ID,Train_no,Train_name,Train_source,Arival_time,Destination_time,Distance) values("+str(flag)+",'"+element[0]+"','"+element[1]+"','"+element[4]+"','"+element[7]+"','"+element[5]+"','"+element[6]+"')"
	cur.execute(query)

	flag+=1

	db.commit()

	print "Query processed :",flag
db.close()

print "records has been inserted into the db successfully!!"


	



