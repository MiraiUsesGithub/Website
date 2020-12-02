var canvas = document.querySelector('canvas');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

var c = canvas.getContext('2d');

//c.fillStyle = 'rgba(255, 0, 0, 0.5)'
//c.fillRect(100, 100, 100, 100);

//c.beginPath();
//c.moveTo(50, 300);
//c.lineTo(300, 50);
//c.moveTo(300, 50);
//c.lineTo(600, 100);
//c.strokeStyle = "#fa34a3";
//c.stroke();
var mouse = {
  x: undefined, y: undefined
}

var colorArray = ['#FFFF'];

window.addEventListener('mousemove', 
  function(event){
    mouse.x = event.x;
    mouse.y = event.y;
    console.log(mouse);
  } 
)

window.addEventListener('resize', function(){
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
})

function Circle(x, y, dx, dy, radius){
   this.x = x;
   this.y = y;
   this.dx = dx;
   this.dy = dy;
   this.radius = radius;
   
   this.draw = function(){
     c.beginPath();
     c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
     //c.stroke();
     c.fillStyle = colorArray[Math.floor(Math.random() * colorArray.length)]
     c.fill();
   }
   this.update = function(){
    if(this.x + this.radius > innerWidth || this.x - this.radius < 0){
      this.dx = -this.dx; 
    }  
    this.x += this.dx;
    if(this.y + this.radius > innerHeight || this.y - this.radius < 0){
      this.dy = -this.dy; 
    }  
    this.y += -this.dy;

    if (mouse.x - this.x < 60  && mouse.x - this.x > -60 
        && mouse.y - this.y < 60  && mouse.y - this.y > -60 && this.radius < 1000){
      this.radius += 1;
    }
    else if (this.radius > 5){
      this.radius -= 1;
    }

    this.draw();
   }   
}

var circleArray = [];
for(var i = 0; i < 1; i++){
  var radius = Math.random() * 3 + 100;
  var x = Math.random() * (innerWidth - radius * 2) + radius;
  var y = Math.random() * (innerHeight - radius * 2) + radius;
  var dx = (Math.random() - 0.5) * 40;
  var dy = (Math.random() - 0.5) * 40;
  circleArray.push(new Circle(x, y, dx, dy, radius));
}

function animate(){
  requestAnimationFrame(animate);
  c.clearRect(0, 0, innerWidth, innerHeight);
  for (var i = 0; i < circleArray.length; i++){
    circleArray[i].update();
  }
}
animate();

