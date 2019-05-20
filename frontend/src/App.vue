<template>
    <div id="app">
        <Header @menu-chosen="goTo"/>
        <router-view @scroll="page = $event" ref="content"/>
        <Footer @menu-chosen="goTo" :page="page" ref="footer"/>
        <icons/>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Header from './components/header/Header.vue'
    import Footer from './components/Footer.vue'
    import Icons from './components/elements/Icons.vue'
    import Utils from './utils/index'

    export default {
        data() {
            return {
                page: 0,
            };
        },
        created() {
            const component = this;
            this.handler = function (event) {
                switch (Utils.getKeyCode(event)) {
                    case 'ArrowLeft':
                    case 37:
                        component.$emit('key-left', event);
                        break;
                    case 'ArrowUp':
                    case 38:
                        component.showFooter();
                        component.$emit('key-up', event);
                        break;
                    case 'ArrowRight':
                    case 39:
                        component.$emit('key-right', event);
                        break;
                    case 'ArrowDown':
                    case 40:
                        component.hideFooter();
                        component.$emit('key-down', event);
                        break;
                }
            };

            window.addEventListener('keyup', this.handler);
        },
        beforeDestroy() {
            window.removeEventListener('keyup', this.handler);
        },
        computed: {
            ...mapGetters(['getModal']),
        },
        methods: {
            showFooter() {
                if (this.getModal().isVisible) {
                    return;
                }

                this.$refs.footer.isHidden = this.$refs.content.isWide = false;
            },
            hideFooter() {
                if (this.getModal().isVisible) {
                    return;
                }

                this.$refs.footer.isHidden = this.$refs.content.isWide = true;
            },
            goTo(slug) {
                let container = this._getContainer();
                let containerOffset = container.offsetLeft;
                let page = this._getPage(slug);
                let pageOffset = page.offsetLeft;

                this._tween(containerOffset, pageOffset, 200, container);
            },
            _tween(start, end, duration, w) {
                /**
                 * @todo WARNING! This function doesn't work properly and should be refactored
                 * https://codepen.io/matths/pen/yjbis
                 */
                let delta = end - start;
                let startTime = performance.now();
                let easeOutQuad = function (t, b, c, d) {
                    return -c * (t /= d) * (t - 2) + b;
                };

                let tweenLoop = function (time) {
                    let t = (time ? time - startTime : 0);
                    let factor = easeOutQuad(t, 0, 1, duration);
                    w.scrollLeft = start + delta * factor;

                    if (t < duration) {
                        requestAnimationFrame(tweenLoop);
                    } else if (w.scrollLeft !== end) {
                        w.scrollLeft = end;
                    }
                };
                tweenLoop();
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
        components: {
            Header,
            Footer,
            Icons,
        }
    }
</script>

<style lang="scss">
    @import "assets/scss/global";
    @import "assets/scss/grid";
</style>
