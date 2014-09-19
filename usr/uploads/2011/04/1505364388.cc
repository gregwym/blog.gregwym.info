void countingSort(int *A, int k, int n){
	int i, B[n], C[k];
	for(i=0; i<n; i++){
		C[A[i]]++;
		B[i] = A[i];
	}
	for(i=1; i<k; i++)
		C[i] = C[i] + C[i-1];
	for(i = n-1; i>=0; i--){
		C[B[i]]--;
		A[C[B[i]]] = B[i];
	}
	return;
}