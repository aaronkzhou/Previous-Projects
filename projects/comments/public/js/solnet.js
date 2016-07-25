function evaluateDivisors(a,b,k){
 var count=0;
  a1=Math.ceil(Math.sqrt(a));
  b1=Math.floor(Math.sqrt(b));
   var flag=[];
  for(z=0;z<=b1-a1+2;z++){
    flag.push(0);
  }
  
	for(i=a1;i<=b1;i++){
		if(flag[i-a1] == -1){
			continue;
		}
	 	var countdivisors=0;
		for(j=1;j<=i;j++){
			if ((i*i)%j===0) {
				countdivisors++;
			}
			if (countdivisors >= k) break;
		}
		if (countdivisors > k) break;
		if(countdivisors===(k+1)/2){
		  flag[i-a1] = 1;
		  count++;
		  for(m=2;i*m<=b1;++m){
		  	flag[i*m-a1] = -1;
		  }
		}
	}
	return count;
}

function evaluateDivisors1(a,b,k){
  var count=0, y=(k+1)/2;
  var i=Math.ceil(Math.sqrt(a));
  var b1=Math.floor(Math.sqrt(b));
	for(i;i<=b1;i++){
   	var countdivisors=0;
		for(j=1;j<=i;j++){
			if ((i*i)%j===0) {
				countdivisors++;
			}
			if (countdivisors >= k) break;
		}
		if (countdivisors > k) break;
		
		if(countdivisors===y){
		  count++;
		}
	}
	return count;
}
