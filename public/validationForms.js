
//   const depForm = document.getElementById("depForm");
//   const depName = document.getElementById("depName");

//   depForm.addEventListener('submit' , e =>{
//         e.preventDefault();
//         checkInput();
//   });

//     function checkInput(){
//         const dep_Name = depName.value.trim();
//         if(dep_Name === ''){
//             setError(dep_Name , "cant be blank");
//         } 
//         else{
//             setSuccess(dep_Name);
//         }  
//     }
//     function setError(input ,  message){
//         const formControl = input.parentElement;
//         const small = formControl.querySelector('small');
//         formControl.className = 'form-control error';
//         small.innerText = message;
//     }
