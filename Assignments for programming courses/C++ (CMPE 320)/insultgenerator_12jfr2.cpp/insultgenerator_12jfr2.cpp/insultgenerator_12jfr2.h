#pragma once

#include <string>
#include <vector>
using namespace std;

class FileException {
public:
	FileException(const string& message);
	string& what();
private:
	string message;
};

class InsultGenerator{
public:
	InsultGenerator(void);
	int initialize();
	string talkToMe();
	vector<string> generate(const int&);
	unsigned int generateAndSave(const string&, const int&);
private:
	//void alphabetize(vector<string>&);
	vector<string> firstWord;
	vector<string> middleWord;
	vector<string> lastWord;
};

class TextFileIO {
public:
	TextFileIO(const string& filename);
	vector<string> readFile() const;
	int writeFile(const vector<string>& contents) const;
private:
	string filename;
};

class NumInsultsOutOfBounds{
public:
	NumInsultsOutOfBounds(const string& message);
	string& what();
private:
	string message;
};