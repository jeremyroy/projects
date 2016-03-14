#include <string>
#include "stdafx.h"
//#include <locale>
#include "jumble.h"

//using namespace std;

JumblePuzzle::JumblePuzzle(string wordToHide, string myDifficulty){
	//myDifficulty = stringToLowerCase(myDifficulty);
	//wordToHide = stringToLowerCase(wordToHide);
	if (myDifficulty == "easy")
		difficulty = EASY;
	else if (myDifficulty == "medium")
		difficulty = MEDIUM;
	else if (myDifficulty == "hard")
		difficulty = HARD;
	//else
		//throw BadJumbleException("Illigal difficulty!");
}

/*string stringToLowerCase(string str){
	string newStr = "";
	for (std::string::size_type i = 0; i<str.length(); ++i)
		if (isupper(str[i]))
			newStr += tolower(str[i]);
}*/