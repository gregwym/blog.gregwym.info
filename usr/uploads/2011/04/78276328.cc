#include <iostream>

using namespace std;

void swap(int *A, int i, int j){
	int temp;
	temp = A[i];
	A[i] = A[j];
	A[j] = temp;
	return;
}

int partition(int *A, int p, int n){
	swap(A, 0, p);
	int i = 1, j = n - 1;
	while(i <= j){
		while(A[i] <= A[0] && i < n)
			i++;
		while(A[j] > A[0] && j > 0)
			j--;
		if(i <= j) swap(A, i, j);
	}
	swap(A, 0, j);
	return j;
}

int quickSelect(int *A, int k, int n){
	int p = 0;
	int i = partition(A, p, n);
	if(i == k) return A[i];
	else if(i > k) return quickSelect(A, k, i);
	else if(i < k) return quickSelect(A+i+1, k-i-1, n-i-1);
	return -1;
}

void quickSort(int *A, int n){
	if(n <= 1) return;	
	int p = 0;
	int i = partition(A, p, n);
	quickSort(A, i);
	quickSort(A + i + 1, n - i - 1);
}

int main(){
	int a[10] = {2,4,3,1,9,5,0,7,6,8};
	// int m = quickSelect(a, 10, 10);
	// cout << m << endl;
	quickSort(a, 10);
	for(int i = 0; i < 10; i++)
		cout << a[i] << endl;
	// return m;
}
