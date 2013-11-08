#include <stdio.h>
#include <string.h>

void main()
{
	char cmd[1000]="11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111";
	char *submitid="1";
	char *result = "ACCEPTED";
	//printf("%s",cmd);
	strcpy(cmd, "UPDATE 'submit' SET 'status' = '1', 'result' = '");
	//strcat(cmd, result);
	//strcat(cmd, "' WHERE 'submit'.'id' = ");
	//strcat(cmd, submitid);
	printf("%s\n",cmd);
}