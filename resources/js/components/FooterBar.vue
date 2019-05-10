<template>
    <footer class="footer-bar">
        <slot></slot>
    </footer>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
    }
</script>

<style lang="scss">

    body {
        padding-bottom: 70px;
    }

    footer.footer-bar {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 70px;
        background-color: #FFF;
        box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        padding: 0 1rem;

        .button {
            margin: 0 0.25rem;
        }
    }
</style>
