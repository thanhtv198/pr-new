var io = require('socket.io')(6000);
console.log('connected port');
io.on('error', function(socket){
    console.log('error');
})
io.on('connection', function(socket){
    console.log('connected: '+ socket.id);
});
var Redis = require('ioredis');
var redis = new Redis(1000);
redis.psubcribe("*", function (error) {

});
