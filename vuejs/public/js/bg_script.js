var Canvas = document.getElementById('canvas');
var ctx = Canvas.getContext('2d');

var Around_earth = document.getElementById('around_earth');
var ctx_f = Around_earth.getContext('2d');

var resize = function() {
    Canvas.width = Canvas.clientWidth;
    Canvas.height = Canvas.clientHeight;

    Around_earth.width = Around_earth.clientWidth;
    Around_earth.height = Around_earth.clientHeight;
};
window.addEventListener('resize', resize);
resize();

var elements = [];
var elements_f = [];
var presets = {};

presets.o = function (x, y, s, dx, dy) {
    return {
        x: x,
        y: y,
        r: 12 * s,
        w: 5 * s,
        dx: dx,
        dy: dy,
        draw: function(ctx, t) {
            this.x += this.dx;
            this.y += this.dy;
            
            ctx.beginPath();
            ctx.arc(this.x + + Math.sin((50 + x + (t / 10)) / 100) * 3, this.y + + Math.sin((45 + x + (t / 10)) / 100) * 4, this.r, 0, 2 * Math.PI, false);
            ctx.lineWidth = this.w;
            ctx.strokeStyle = '#fff';
            ctx.stroke();
        }
    }
};

presets.o_f = function (x, y, s, dx, dy) {
    return {
        x: x,
        y: y,
        r: 12 * s,
        w: 5 * s,
        dx: dx,
        dy: dy,
        draw: function(ctx_f, t) {
            this.x += this.dx;
            this.y += this.dy;
            
            ctx_f.beginPath();
            ctx_f.arc(this.x + + Math.sin((50 + x + (t / 10)) / 100) * 3, this.y + + Math.sin((45 + x + (t / 10)) / 100) * 4, this.r, 0, 2 * Math.PI, false);
            ctx_f.lineWidth = this.w;
            ctx_f.strokeStyle = '#fff';
            ctx_f.stroke();
        }
    }
};

presets.x = function (x, y, s, dx, dy, dr, r) {
    r = r || 0;
    return {
        x: x,
        y: y,
        s: 20 * s,
        w: 5 * s,
        r: r,
        dx: dx,
        dy: dy,
        dr: dr,
        draw: function(ctx, t) {
            this.x += this.dx;
            this.y += this.dy;
            this.r += this.dr;
            
            var _this = this;
            var line = function(x, y, tx, ty, c, o) {
                o = o || 0;
                ctx.beginPath();
                ctx.moveTo(-o + ((_this.s / 2) * x), o + ((_this.s / 2) * y));
                ctx.lineTo(-o + ((_this.s / 2) * tx), o + ((_this.s / 2) * ty));
                ctx.lineWidth = _this.w;
                ctx.strokeStyle = c;
                ctx.stroke();
            };
            
            ctx.save();
            
            ctx.translate(this.x + Math.sin((x + (t / 10)) / 100) * 5, this.y + Math.sin((10 + x + (t / 10)) / 100) * 2);
            ctx.rotate(this.r * Math.PI / 180);

            line(-1, -1, 1, 1, '#fff');
            line(1, -1, -1, 1, '#fff');
            
            ctx.restore();
        }
    }
};

presets.x_f = function (x, y, s, dx, dy, dr, r) {
    r = r || 0;
    return {
        x: x,
        y: y,
        s: 20 * s,
        w: 5 * s,
        r: r,
        dx: dx,
        dy: dy,
        dr: dr,
        draw: function(ctx_f, t) {
            this.x += this.dx;
            this.y += this.dy;
            this.r += this.dr;
            
            var _this = this;
            var line = function(x, y, tx, ty, c, o) {
                o = o || 0;
                ctx_f.beginPath();
                ctx_f.moveTo(-o + ((_this.s / 2) * x), o + ((_this.s / 2) * y));
                ctx_f.lineTo(-o + ((_this.s / 2) * tx), o + ((_this.s / 2) * ty));
                ctx_f.lineWidth = _this.w;
                ctx_f.strokeStyle = c;
                ctx_f.stroke();
            };
            
            ctx_f.save();
            
            ctx_f.translate(this.x + Math.sin((x + (t / 10)) / 100) * 5, this.y + Math.sin((10 + x + (t / 10)) / 100) * 2);
            ctx_f.rotate(this.r * Math.PI / 180);

            line(-1, -1, 1, 1, '#fff');
            line(1, -1, -1, 1, '#fff');
            
            ctx_f.restore();
        }
    }
};

for(var x = 0; x < Canvas.width; x++) {
    for(var y = 0; y < Canvas.height; y++) {
        if(Math.round(Math.random() * 8000) == 1) {
            var s = ((Math.random() * 5) + 1) / 10;
            if(Math.round(Math.random()) == 1)
                elements.push(presets.o(x, y, s, 0, 0));
            else
                elements.push(presets.x(x, y, s, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));
        }
    }
}

elements_f.push(presets.o_f(90, 188,  0.8, 0, 0));
elements_f.push(presets.o_f(120, 128,  0.6, 0, 0));
elements_f.push(presets.x_f(65, 160,  0.5, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));
elements_f.push(presets.x_f(40, 150,  0.35, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));

elements_f.push(presets.o_f(110, 388,  0.7, 0, 0));
elements_f.push(presets.o_f(130, 435,  0.6, 0, 0));
elements_f.push(presets.o_f(80, 420,  0.4, 0, 0));

elements_f.push(presets.o_f(580, 138,  0.8, 0, 0));
elements_f.push(presets.o_f(630, 240,  0.6, 0, 0));
elements_f.push(presets.x_f(660, 160,  0.5, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));

elements_f.push(presets.x_f(540, 300,  0.5, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));
elements_f.push(presets.x_f(610, 360,  0.5, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));

elements_f.push(presets.x_f(341, 195,  0.35, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));
elements_f.push(presets.x_f(255, 196,  0.3, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));
elements_f.push(presets.x_f(200, 240,  0.2, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));
elements_f.push(presets.x_f(245, 295,  0.2, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));

setInterval(function() {
    ctx.clearRect(0, 0, Canvas.width, Canvas.height);
    ctx_f.clearRect(0, 0, Around_earth.width, Around_earth.height);

    var time = new Date().getTime();
    for (var e in elements)
		elements[e].draw(ctx, time);

    for (var i in elements_f)
        elements_f[i].draw(ctx_f, time);
}, 10);