/*
* The project in my ELEC 374 course was to make a mini SRC RISC processor.
* For fun I decided to make an assembler for my processor.
*
*********IN PROGRESS*********
*/

#include <stdio.h>
#include <stdlib.h>
#include <dirent.h>
#include <string>
#include <ctype.h>

 int lineNum = 1;

using namespace std;

int main(int argc, char *argv[]){
	FILE *stream;
	char name[64];
	char ch;
	string firstToken, secondToken, ThirdToken, FourthToken;
	int tokenCount = 1; int lineLength = 0;
	//const char *table = argv[1];
	strncpy(name, argv[1], 64);
	strcat(name, ".txt");
	stream = fopen(name, "r");
	//check that the file had information
	if (stream == NULL){
		fprintf(stderr,"Could not open %s\n",name);
		exit(-1);
	}
	printf("Starting to assemble %s\n", argv[1]);
	while (!feof(stream)){
		ch = fgetc(stream);
		if (ch = '\n'){
			//new instruction
			string binOpCode, hexOpCode;
			tokenCount = 1;
			binOpCode = computeBinOpCode(firstToken, secondToken, thirdToken, fourthToken, tokenCount);
			hexOpCode = bin32ToHex(binOpCode);
			lineNum ++;
		}
		else if (ch = '\t' || ch = ','){
			tokenCount++;
			if (tokenCount > 4){
				perror("Invalid Instruction at line %d", lineNum)
				exit 1;
			}
		}
		else{
			switch(tokenCount){
				case 1: firstToken += ch;
				case 2: secondToklen += ch;
				case 3: thirdToken += ch;
				case 4: fourthToken += ch;
			}
		}
	}
	printf("\');");
}

string computeOpCode(const string firstToken, const string secondToken, const string thirdToken, const string fourthToken, const int tokenCount){
	string opCode;
	opCode += computeFirstToken(firtToken);
	if (tokenCount >= 2)
		opCode += computeSecondToken(firstToken, secondToken);
	if (tokenCount >= 3)
		opCode += computeThirdToken(firstToken, thirdToken);
	if (tokenCount >= 4)
		opCode += computeFourthToken(fourthToken);
	return opCode;
}

string computeFirstToken(const string firstToken){
	string instCode;
	switch (firstToken){
		case "ld"	:	instCode = "00000";
		case "ldi"	:	instCode = "00001";
		case "st"	:	instCode = "00010";
		case "ldr"	:	instCode = "00011";
		case "str"	:	instCode = "00100";
		case "add"	:	instCode = "00101";
		case "sub"	:	instCode = "00110";
		case "and"	:	instCode = "00111";
		case "or"	:	instCode = "01000";
		case "shr"	:	instCode = "01001";
		case "shl"	:	instCode = "01010";
		case "ror"	:	instCode = "01011";
		case "rol"	:	instCode = "01100";
		case "addi"	:	instCode = "01101";
		case "andi"	:	instCode = "01110";
		case "ori"	:	instCode = "01111";
		case "mul"	:	instCode = "10000";
		case "div"	:	instCode = "10001";
		case "neg"	:	instCode = "10010";
		case "not"	:	instCode = "10011";
		case "brzr"	:	instCode = "10100"; //Difference in branch instructions comes at end of opCode
		case "brnz"	:	instCode = "10100";
		case "brmi"	:	instCode = "10100";
		case "brpl"	:	instCode = "10100";
		case "jr"	:	instCode = "10101";
		case "jal"	:	instCode = "10110";
		case "in"	:	instCode = "10111";
		case "out"	:	instCode = "11000";
		case "mfhi"	:	instCode = "11001";
		case "mflo"	:	instCode = "11010";
		case "nop"	:	instCode = "11011";
		case "halt"	:	instCode = "11100";
		default:
			perror("Invalid instruction at line %d", lineNum);
	}
	return instCode;
}

string computeSecondToken(const string firstToken, const string secondToken){
	if (firstToken = "st" || firstToken = "str"){ //could be constant or constant plus rb
		
	}
	else{ //could only be ra
		return computeReg(secondToken);
	}
}

string computeReg(const string regNum){
	string reg;
	switch(regNum){
		case "r0"	:	reg = "0000";
		case "r1"	:	reg = "0001";
		case "r2"	:	reg = "0010";
		case "r3"	:	reg = "0011";
		case "r4"	:	reg = "0100";
		case "r5"	:	reg = "0101";
		case "r6"	:	reg = "0110";
		case "r7"	:	reg = "0111";
		case "r8"	:	reg = "1000";
		case "r9"	:	reg = "1001";
		case "r10"	:	reg = "1010";
		case "r11"	:	reg = "1011";
		case "r12"	:	reg = "1100";
		case "r13"	:	reg = "1101";
		case "r14"	:	reg = "1110";
		case "r15"	:	reg = "1111";
	}
	return reg;
}
