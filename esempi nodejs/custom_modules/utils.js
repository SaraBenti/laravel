function hello(name){
    let benvenuto=welcome();
    console.log(`ciao, ${name} ${benvenuto}`);
}

function sum(a,b){
    return a+b;
}

const pi=3.14;

function welcome(){
    return ', benvenuto/a';
}

module.exports={hello,sum,pi};
