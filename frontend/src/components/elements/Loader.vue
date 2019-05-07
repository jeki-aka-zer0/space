<template>
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</template>

<style lang="scss" scoped>
    .lds-ellipsis {
        display: inline-block;
        height: 64px;
        position: relative;
        width: 64px;
        
        div {
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
            background: #fff;
            border-radius: 50%;
            height: 11px;
            position: absolute;
            top: 27px;
            width: 11px;

            &:nth-child(1) {
                left: 6px;
                animation: lds-ellipsis1 0.6s infinite;
            }

            &:nth-child(2) {
                left: 6px;
                animation: lds-ellipsis2 0.6s infinite;
            }

            &:nth-child(3) {
                left: 26px;
                animation: lds-ellipsis2 0.6s infinite;
            }

            &:nth-child(4) {
                left: 45px;
                animation: lds-ellipsis3 0.6s infinite;
            }
        }
    }

    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }

    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }

    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(19px, 0);
        }
    }
</style>