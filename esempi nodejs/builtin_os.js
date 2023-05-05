const os=require('os');//libreria built in, per convenzione la const si chiama come la libreria
console.log('uptime: '+os.uptime());
console.log(os.userInfo());
console.log(os.arch());
console.log(os.platform());
console.log(os.freemem());
console.log(os.totalmem());