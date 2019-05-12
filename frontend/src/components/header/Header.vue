<template>
    <header>
        <div class="max-width-center">
            <div class="nav">
                <Brand @menuChosen="goTo"/>
                <Slogan/>
                <Languages/>
                <Menu @menuChosen="goTo"/>
            </div>
        </div>
    </header>
</template>

<script>
    import Brand from './Brand.vue'
    import Slogan from './Slogan.vue'
    import Languages from './Languages.vue'
    import Menu from './Menu.vue'


    // https://codepen.io/matths/pen/yjbis
    var easeInQuad = function (t, b, c, d) {
        return c*(t/=d)*t + b;
    };
    var easeOutQuad = function (t, b, c, d) {
        return -c *(t/=d)*(t-2) + b;
    };

    var tween = function (start, end, duration, w) {
        var delta = end - start;
        var startTime = performance.now();

        var tweenLoop = function (time) {
            var t = (time ? time - startTime : 0);
            var factor = easeOutQuad(t, 0, 1, duration);
            w.scrollLeft = start + delta * factor;
            console.log(start + delta * factor);
            if (t < duration) {
                requestAnimationFrame(tweenLoop);
            } else if (w.scrollLeft !== end) {
                w.scrollLeft = end;
            }
        };
        tweenLoop();
    };

    export default {
        components: {
            Brand,
            Slogan,
            Languages,
            Menu
        },
        methods: {
            goTo(slug) {
                let container = this._getContainer();
                let containerOffset = container.offsetLeft;
                let page = this._getPage(slug);
                let pageOffset = page.offsetLeft;
                // let diff = pageOffset - containerOffset;

                tween(containerOffset, pageOffset, 200, container);
            },
            _getContainer() {
                let elements = document.getElementsByClassName('pages-wrapper');

                if (elements.length !== 1) {
                    throw new Error('Can not detect container.');
                }

                return elements[0];
            },
            _getPage(slug) {
                let elements = document.getElementsByClassName('page-' + slug);

                if (elements.length !== 1) {
                    throw new Error('Can not detect page.');
                }

                return elements[0];
            },
        },
    }
</script>

<style lang="scss">
    header {
        padding: 30px 10px 5px;
        position: fixed;
        width: 100%;
        z-index: 20;

        .nav {
            align-items: center;
            display: flex;
        }
    }
</style>