/* This program is written by Sadam Hussain Ganie[23CSM2R20] For lab assignment purpose only*/

#include <stdio.h>
#include <string.h>
#include <stdbool.h>
#include <mysql.h>
#include <ctype.h>

// Function to validate the password based on policies
// Min one upper character, min one digit, min one special character, length atleast 6
bool validatePassword(char *password) {
    int len = strlen(password);

    // Check minimum length
    if (len < 6) {
        return false;
    }

    bool hasUppercase = false;
    bool hasNumber = false;
    bool hasSpecialChar = false;

    for (int i = 0; i < len; i++) {
        char ch = password[i];

        // Check for uppercase letter
        if (isupper(ch)) {
            hasUppercase = true;
        }
        // Check for a digit
        else if (isdigit(ch)) {
            hasNumber = true;
        }
        // Check for special character
        else if (!isalnum(ch)) {
            hasSpecialChar = true;
        }

        // If all required conditions are met, you can break early
        if (hasUppercase && hasNumber && hasSpecialChar) {
            return true;
        }
    }

    // Return false if any of the conditions are not met
    return false;
}

int main() {
    char username[20];
    char password[20];

    printf("Enter your username(max 30 characters): ");
    scanf("%s", username);

    printf("Enter your password: ");
    scanf("%s", password);

    if (validatePassword(password)) {
        printf("Username and Password is valid.\n");

        MYSQL *conn;
	MYSQL_RES *res;
	MYSQL_ROW row;
	
	char *server = "127.0.0.1";
	char *user = "test";
	char *password = "root"; 
	char *database = "users";
	
	conn = mysql_init(NULL);
        
        // Replace 'server', 'user', 'password', and 'database' with your MySQL server details.
        if (mysql_real_connect(conn, server, user, password, database, 0, NULL, 0)) {
            // Construct the SQL query to insert the username and hashed password.
            char query[100];
            sprintf(query, "INSERT INTO users (username, password) VALUES ('%s', SHA2('%s', 256))", username, password);
            
            if (mysql_query(conn, query) == 0) {
                printf("Query OK, 1 rows affected.\nData inserted into the database successfully.\n");
            } else {
                fprintf(stderr, "Error: %s\n", mysql_error(conn));
            }

            mysql_close(conn);
        } else {
            fprintf(stderr, "Error: %s\n", mysql_error(conn));
        }
    } else {
        printf("Password is invalid.\nPassword must satisfy following policy:\n\t1. At least one upper character.\n\t2. At least one special character.\n\t3. At least one digit.\n\t4. Minimum langth is 6.");
    }

    return 0;
}

