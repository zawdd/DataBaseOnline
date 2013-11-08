#include <stdio.h>
#include <stdlib.h>
#include <mysql.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <unistd.h>
#include <popen2.h>

int main() {
	MYSQL *conn_ptr;
	MYSQL_RES *res_ptr;
  	MYSQL_ROW sqlrow;
	MYSQL_FIELD *fd;
	int TIMELIMIT = 15;
	int res, i, j;
	char* result="NULL";
	char* submitid = "";
	char updatequery[1000]="";
	char cmdrun[200]="";
	struct popen2 kid;
	pid_t pr;
	char buf[1000];
	conn_ptr = mysql_init(NULL);
	//int nn=100;
	if (!conn_ptr) {
		return EXIT_FAILURE;
	}
	conn_ptr = mysql_real_connect(conn_ptr, "localhost", "root", "0818", "test", 0, NULL, 0);
	if (conn_ptr) {
		while(1){//nn-->0){
		res = mysql_query(conn_ptr, "select submit.id, problem.intxt, problem.outtxt, submit.address from problem,submit where submit.status=0 and problem.id=submit.problemid order by time limit 1"); //查询语句
		if (res) {       
			printf("SELECT error:%s\n",mysql_error(conn_ptr));   
		} else {      
			res_ptr = mysql_store_result(conn_ptr);				//取出结果集
			if((unsigned long)mysql_num_rows(res_ptr)) {             
				printf("%lu Rows\n",(unsigned long)mysql_num_rows(res_ptr)); 
				j = mysql_num_fields(res_ptr);        
				//while((sqlrow = mysql_fetch_row(res_ptr)))  {	//依次取出记录
				sqlrow = mysql_fetch_row(res_ptr);
				submitid = sqlrow[0];
				for(i = 0; i < j; i++)       
					printf("%s\t", sqlrow[i]); 				//输出
				printf("\n");  
				//handle this file
				strcpy(cmdrun, "./run ");
				strcat(cmdrun, sqlrow[3]);
				strcat(cmdrun, " ");
				strcat(cmdrun, sqlrow[1]);
				strcat(cmdrun, " ");
				strcat(cmdrun, sqlrow[2]);
				//popen2("./run a b c", &kid);
				popen2(cmdrun, &kid);
				do{	
					pr = waitpid(kid.child_pid, NULL, WNOHANG);
					if(pr==0){
						printf("nochild,or still running\n");
						sleep(1);
						i++;
					}
					if(i>TIMELIMIT){	
						printf("timeout,kill run!\n");
						kill(kid.child_pid, 0);
						break;
					}
				}while(pr==0);
				if(pr==kid.child_pid){
					printf("sucess run\n");
					memset(buf, 0, 1000);
					read(kid.from_child, buf, 1000);
					//printf("from run: %s", buf); 
					if(!strcmp(buf,"accepted\n"))
						result = "ACCEPTED";
					else if(!strcmp(buf, "compileerror\n"))
						result = "COMPILE ERROR";
					else if(!strcmp(buf, "wronganswer\n"))
						result = "WRONG ANSWER"; 
					else if(!strcmp(buf, "timeout\n"))
						result = "TIME OUT";
					else
						result = "ERROR";
					
					printf("result: %s\n", result);
				}else
					printf("run is error\n");
				if (mysql_errno(conn_ptr)) {                    
					fprintf(stderr,"Retrive error:s\n",mysql_error(conn_ptr));             
				}
				mysql_free_result(res_ptr); 
			}else{
				printf("No unjudged problem!\n");
				mysql_free_result(res_ptr); 
				sleep(100);
				continue;
			}
			     
		}

		strcpy(updatequery, "UPDATE submit SET status = '1', result = '");
		strcat(updatequery, result);
		strcat(updatequery, "' WHERE submit.id = ");
		strcat(updatequery, submitid);

		//res = mysql_query(conn_ptr, "UPDATE `submit` SET `status` =  '1',`result` =  'ac'  WHERE  `submit`.`id` =1");
		res = mysql_query(conn_ptr, updatequery);
		if(res) {
			printf("UPDATE error:%s\n",mysql_error(conn_ptr));
		} else {
			//continue
		}
		}//while
	} else {
		printf("Connection failed\n");
	}
	mysql_close(conn_ptr);
	return EXIT_SUCCESS;
}
