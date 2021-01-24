<template>
  <canvas ref="bg_a" :style="style"></canvas>
</template>

<script>
export default {
  props: {
    behavior: {
      type: String,
      default: 'random'
    },
    options: {
      type: Array
    },
    style: {
      type: String
    }
  },
  mounted () {
    this.render(this.behavior, this.options)
  },
  methods: {
    render: function (behavior = 'random', options = null) {
      var Canvas = this.$refs.bg_a
      var ctx = Canvas.getContext('2d')
      var resize = function () {
        Canvas.width = Canvas.clientWidth
        Canvas.height = Canvas.clientHeight
      }
      window.addEventListener('resize', resize)
      resize()
      var elements = []
      var presets = {}

      presets.o = function (x, y, s, dx, dy) {
        return {
          x: x,
          y: y,
          r: 12 * s,
          w: 5 * s,
          dx: dx,
          dy: dy,
          draw: function (ctx, t) {
            this.x += this.dx
            this.y += this.dy

            ctx.beginPath()
            ctx.arc(this.x + Math.sin((50 + x + (t / 10)) / 100) * 3, this.y + Math.sin((45 + x + (t / 10)) / 100) * 4, this.r, 0, 2 * Math.PI, false)
            ctx.lineWidth = this.w
            ctx.strokeStyle = '#fff'
            ctx.stroke()
          }
        }
      }

      presets.x = function (x, y, s, dx, dy, dr, r) {
        r = r || 0
        return {
          x: x,
          y: y,
          s: 20 * s,
          w: 5 * s,
          r: r,
          dx: dx,
          dy: dy,
          dr: dr,
          draw: function (ctx, t) {
            this.x += this.dx
            this.y += this.dy
            this.r += this.dr

            var _this = this
            var line = function (x, y, tx, ty, c, o) {
              o = o || 0
              ctx.beginPath()
              ctx.moveTo(-o + ((_this.s / 2) * x), o + ((_this.s / 2) * y))
              ctx.lineTo(-o + ((_this.s / 2) * tx), o + ((_this.s / 2) * ty))
              ctx.lineWidth = _this.w
              ctx.strokeStyle = c
              ctx.stroke()
            }

            ctx.save()

            ctx.translate(this.x + Math.sin((x + (t / 10)) / 100) * 5, this.y + Math.sin((10 + x + (t / 10)) / 100) * 2)
            ctx.rotate(this.r * Math.PI / 180)

            line(-1, -1, 1, 1, '#fff')
            line(1, -1, -1, 1, '#fff')

            ctx.restore()
          }
        }
      }

      if (behavior === 'random') {
        for (var x = 0; x < Canvas.width; x++) {
          for (var y = 0; y < Canvas.height; y++) {
            if (Math.round(Math.random() * 8000) === 1) {
              var s = ((Math.random() * 5) + 1) / 10
              if (Math.round(Math.random()) === 1) {
                elements.push(presets.o(x, y, s, 0, 0))
              } else {
                elements.push(presets.x(x, y, s, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)))
              }
            }
          }
        }
      } else if (behavior === 'stated') {
        for (var option in options) {
          if (options[option].type === 'x') elements.push(presets.x(options[option].position.x, options[option].position.y, options[option].size, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)))
          else elements.push(presets.o(options[option].position.x, options[option].position.y, options[option].size, 0, 0))
        }
      }

      setInterval(function () {
        var time = new Date().getTime()

        ctx.clearRect(0, 0, Canvas.width, Canvas.height)

        for (var e in elements) {
          elements[e].draw(ctx, time)
        }
      }, 10)
    }
  }
}
</script>

<style scoped>
  canvas {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    display: none;
  }
  @media (min-width: 992px) {
    canvas {
      display: block;
    }
  }
</style>
