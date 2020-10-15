// (function(gloable){
//     let student={
//         firstName:'Jay',
//         lastName:'Doe',
//         fullName:function(){
//             return `Hello ${this.firstName} ${this.lastName}`
//         },
//         setName:function(firstName,lastName){
//             this.firstName=firstName;
//             this.lastName=lastName;
//             console.log(this);
//         }
//     }
//     student.setName('Jane','OPS')
//     console.log(student.fullName());
//     gloable.G$=window.student;
// }(window))
// console.log(G$.fullName());

let JU={
    name:'涼涼',
    status:function(seeSomeone){
        if(seeSomeone === 'boss'){
            return 'Very angry!!!!'
        }else{
            return 'So so'
        }
    },
    action:function(todo){
        if(todo ==='甩屌') {
            return 'Very Happy!!!'
        }else{
            return 'Very want to 甩屌'
        }
    },
    info:function(){
        return `name is ${this.name}.${this.name} is ${this.status('boss')}and ${this.action()}`
    }   
}
console.log(JU.info());