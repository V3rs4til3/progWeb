function usernameExist(){
    let username = document.querySelector('#username').value;
    let data = new FormData();
    data.append('username', username)
    fetch('/MVC/Api/userExist',{
        method: 'post',
        body: data
    }).then(response =>{
        if(response.ok){
            console.log('existe');
        }
        else{
            console.log('existe pas');
        }
    });
}
document.querySelector('#username').addEventListener('blur', usernameExist);