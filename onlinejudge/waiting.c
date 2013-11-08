#include <sys/types.h>
#include <stdio.h>
#include <sys/wait.h>

#include <unistd.h>

int main()

{        

         pid_t pc, pr;

         pc=fork(); 

         if(pc<0){   

                   /*如果fork出错 */               

                   printf("Erroroccured on forking.\n");      

         }else if(pc==0){                   

                   /*如果是子进程 */               
			execl("/bin/sh", "sh", "-c", "./cycle", 0);
             //sleep(10);

                   /*睡眠10秒 */             

			exit(0);     

         }        

         /*如果是父进程 */      

         do{             

                   pr=waitpid(pc, NULL, WNOHANG);          

                   /*使用了WNOHANG参数，waitpid不会在这里等待 */                   

                   if(pr==0){                    

                   /*如果没有收集到子进程 */                         

                            printf("Nochild exited\n");                         

					sleep(1);  

                   }

         }while(pr==0);            

                   /*没有收集到子进程，就回去继续尝试 */      

                   if(pr==pc)          

                            printf("successfullyget child %d\n", pr);         

                   else           

                            printf("someerror occured\n");

}

 
