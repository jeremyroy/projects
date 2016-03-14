/*
* Implementation file for JumblePuzzle class.
* Author: Jeremy Roy
* NetId: 12jfr2
*/

#include "stdafx.h"
#include <string>
#include "jumble.h"
#include <cstdlib>
#include <ctime>
#include <iostream>

using namespace std;

//Exception class declaration
BadJumbleException::BadJumbleException(const string& message) : message(message) {}
string& BadJumbleException::what(){ return message; }

//JumblePuzzle Constructor
JumblePuzzle::JumblePuzzle(const string wordToHide, const string myDifficulty){
	setDifficulty(myDifficulty, wordToHide);
	setWord(wordToHide);
	createJumble();
}//end constructor

//copy constructor
JumblePuzzle::JumblePuzzle(JumblePuzzle& old){
	difficulty = old.difficulty;
	hiddenWord = old.hiddenWord;
	jumbleSize = old.jumbleSize;
	colPos = old.colPos;
	rowPos = old.rowPos;
	direction = old.direction;
	//and now for the jumble
	jumble = cloneJumble(old.jumble);
}//end copy constructor

//destructor
JumblePuzzle::~JumblePuzzle(){
	for (int row = 0; row < jumbleSize; row++){
		delete jumble[row];
		jumble[row] = nullptr;
	}
	delete jumble;
	jumble = nullptr;
}//end destructor

//Assignment operator
JumblePuzzle& JumblePuzzle::operator=(const JumblePuzzle& right){
	if (this != &right){
		for (int row = 0; row < jumbleSize; row++){
			delete jumble[row];
			jumble[row] = nullptr;
		}
		delete jumble;
		difficulty = right.difficulty;
		hiddenWord = right.hiddenWord;
		jumbleSize = right.jumbleSize;
		colPos = right.colPos;
		rowPos = right.rowPos;
		direction = right.direction;
		//and now for the jumble
		jumble = cloneJumble(right.jumble);
	}//end if
	return *this;
}//end assignment operator

//creates clone of type charArrayPtr*
charArrayPtr* JumblePuzzle::cloneJumble(const charArrayPtr* old) const{
	charArrayPtr* returnJumble = new charArrayPtr[jumbleSize];
	for (int row = 0; row < jumbleSize; row++){
		returnJumble[row] = new char[jumbleSize];
		for (int col = 0; col < jumbleSize; col++)
			returnJumble[row][col] = old[row][col]; //generate random lower case letter (ascii dec code)
	}//end for
	return returnJumble;
}//end cloneJumble

//One parameter function to set new difficulty
void JumblePuzzle::setNewDifficulty(string myDifficulty){
	setDifficulty(myDifficulty, hiddenWord);
	createJumble(); //remake puzzle
}//end 1-param setDifficulty

//Two-parameter function to set difficulty
void JumblePuzzle::setDifficulty(string myDifficulty, const string wordToHide){
	//Transform input string to lower case
	stringToLowerCase(myDifficulty);
	//set difficulty and array size
	if (myDifficulty == "easy"){
		difficulty = EASY;
		jumbleSize = wordToHide.length() * 2;
	}
	else if (myDifficulty == "medium"){
		difficulty = MEDIUM;
		jumbleSize = wordToHide.length() * 3;
	}
	else if (myDifficulty == "hard"){
		difficulty = HARD;
		jumbleSize = wordToHide.length() * 4;
	}
	else
		throw BadJumbleException("Illegal difficulty!");
}//end 2-param setDifficulty

//Mutator to set new word
void JumblePuzzle::setNewWord(const string newWord){
	setWord(newWord);
	//set jumble size for new word
	if (difficulty == EASY)
		jumbleSize = newWord.length() * 2;
	else if (difficulty == MEDIUM)
		jumbleSize = newWord.length() * 3;
	else if (difficulty == HARD)
		jumbleSize = newWord.length() * 4;
	createJumble(); //remake puzzle
}//end setNewWord()

//Set word to hide in jumble
void JumblePuzzle::setWord(string newWord){
	if (newWord.length() < 3 || newWord.length() > 10)
		throw BadJumbleException("Word to hide must be between 3 and 10 charcters long.");
	if (isAlphabetic(newWord)){
		stringToLowerCase(newWord); // <-------------------------------------------------------- PROBABLY WHAT YOU'RE LOOKING FOR
		hiddenWord = newWord;       // (just comment it out and you'll be able to see your upercase words)
		wordSize = hiddenWord.length();
	}
	else
		throw BadJumbleException("Word to hide must be alphabetic!");
}//end setWord()


//generate random printing direction
void JumblePuzzle::setDirection(){
	srand(time(NULL));
	int dir = rand() % 4;
	if (dir == 0)
		direction = 'n';
	else if (dir == 1)
		direction = 's';
	else if (dir == 2)
		direction = 'e';
	else
		direction = 'w';
}//end setDirection()

//Generates random row and column starting position
void JumblePuzzle::setPosition(){
	srand(time(NULL));
	colPos = rand() % (jumbleSize - 1);
	rowPos = rand() % (jumbleSize - 1);
}//end setPosition()

//Creates Jumble Puzzle on heap
void JumblePuzzle::createJumble(){
	jumbleInit();
	while (hideWord() == 0); //keep trying to hide word until successful
}//end createJumble()

//Initialize jumble array on heap
void JumblePuzzle::jumbleInit(){
	srand(time(NULL));
	jumble = new charArrayPtr[jumbleSize];
	for (int row = 0; row < jumbleSize; row++){
		jumble[row] = new char[jumbleSize];
		for (int col = 0; col < jumbleSize; col++)
			jumble[row][col] = rand() % 26 + 97; //generate random lower case letter (ascii dec code)
	}//end for
}//end jumbleInit()

//Write hidden word in jumble at random position in random direction.  If failed, return 0. If successful, return 1.
int JumblePuzzle::hideWord(){
	setPosition();
	setDirection();
	//write hidden word to right location
	if (direction == 's'){
		int row = rowPos;
		for (int i = 0; i < wordSize; i++){
			if (row == jumbleSize) //check if out of bounds
				return 0;
			jumble[row][colPos] = hiddenWord.at(i);
			row++;
		}
	}//end south
	else if (direction == 'n'){
		int row = rowPos;
		for (int i = 0; i < wordSize; i++){
			if (row == -1) //check if out of bounds
				return 0;
			jumble[row][colPos] = hiddenWord.at(i);
			row--;
		}
	}//end north
	else if (direction == 'e'){
		int col = colPos;
		for (int i = 0; i < wordSize; i++){
			if (col == jumbleSize) //check if out of bounds
				return 0;
			jumble[rowPos][col] = hiddenWord.at(i);
			col++;
		}
	}//end east
	else{ //must be west
		int col = colPos;
		for (int i = 0; i < wordSize; i++){
			if (col == -1) //check if out of bounds
				return 0;
			jumble[rowPos][col] = hiddenWord.at(i);
			col--;
		}
	}//end west
	return 1; //if got to here, hidden word written successfully
}//end createJumbleHelper

int JumblePuzzle::getSize() const{
	return jumbleSize;
}//end getSize()

int JumblePuzzle::getColPos() const{
	return colPos;
}//end getColPos()

int JumblePuzzle::getRowPos() const{
	return rowPos;
}//end getRowPos()

char JumblePuzzle::getDirection() const{
	return direction;
}//end getDirection()

//returns 2D array of chars containing puzzle
charArrayPtr* JumblePuzzle::getJumble() const{
	return cloneJumble(jumble);
}//end getJumble()

//Function to tranfrom input string to lower case
void stringToLowerCase(string& str){
	for (int i = 0; i<str.length(); i++)
		if (!islower(str.at(i)))
			str.at(i) = tolower(str.at(i));
}//end stringToLowerCase()

//Function to check if string is alphabetic
int isAlphabetic(const string str){
	for (int i = 0; i < str.length(); i++)
		if (!isalpha(str.at(i)))
			return 0;
	return 1;
}//end isAlphabetic()