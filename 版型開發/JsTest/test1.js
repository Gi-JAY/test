
// (function(fn){
//     alert('test');
//     fn();
// }(test()))
// function test(){
//     console.log('done');
// }

let a=1;
let func1 = new Promise((resolve,reject)=>{
    if(a!==0) {
           resolve();
    }
    else reject();  
})
func1.then(()=>alert(a))
    .then(()=>{
        console.log(a);
        return a=0;
    })
    .then(
        ()=>console.log(a)
    )
    .catch(()=>alert('err'));
console.log('done');
console.log(func1);
