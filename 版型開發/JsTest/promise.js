
// (function (fn) {
//     alert('test');
//     fn;
// }(test()))
// function test() {
//     console.log('done');npm
// }
// console.log('success');

let a = 1;
let func1 = new Promise((resolve, reject) => {
    if (a !== 0) {
        resolve('success');
    }
    else reject();
})
func1.then(
    (a) => {
        alert('test')
        return a;
    }
)
    .then(
        (value) => console.log(value)
    )
    .catch(
        () => alert('err')
    );
console.log('done');
