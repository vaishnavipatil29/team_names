#include<bits/stdc++.h>
using namespace std;

#define number_of_people 3
#define lift_time 10
//time required by lift to cross one floor
int min_time=INT_MAX;
vector<int> opt_path,vec;
// vec contains elements in the min time waste path
//opt_path stores the path which gives optimum time
int fun(int node,vector<int> &vec,int current_time);
vector<int> flr{0,103,100,101};
// floor at which i-th person is .
vector<int> strt_time{0,0,1010,1070};
//time at which i-th people want to travel (i>0)


int main(){
int i,j,k,n,m;
for(i=1,vec.push_back(i);i<=number_of_people;i++,vec.clear())
    fun(i,vec,lift_time*flr[i]);
for(auto x: opt_path)
    cout<<x<<" ";
cout<<min_time;

return 0;
}

int fun(int node,vector<int> &vec,int current_time){    //a recursive dfs solution for finding all possible solution and selecting the optimum value
int i,j,time=0;

if(vec.size()==number_of_people){   // escape condition for recursive function
        current_time=current_time+lift_time*flr[node];  //time required to reach to ground for the final traveller
    for(i=1;i<=number_of_people;i++)
        time=time+(current_time-strt_time[i]); // total time waste after the completion of a path
    if(min_time>time){
        min_time=time;
        opt_path=vec;
    }
for(auto x: vec)
    cout<<x<<" ";
    cout<<"\ttime: "<<time<<endl;
    vec.pop_back();// removing element as all elements have been included
    return 0;
}

for(i=1;i<=number_of_people;i++){
        if((find(vec.begin(),vec.end(),i)==vec.end()) ){
            vec.push_back(i);
           time=max(current_time,strt_time[i])+lift_time*abs(flr[node]-flr[i]);
           //in case lift reaches before departing time of the traveller ,the lift will have to wait .
            fun(i,vec,time);
        }
}
vec.pop_back();         // removing node from opt_path to check other path

return 0;
}
