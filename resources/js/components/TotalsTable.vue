<template>
    <div class="columns mt-5">
        <div class="column is-5 is-offset-7">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Subtotal:</td>
                        <td>{{ subtotal | currency }}</td>
                    </tr>
                    <tr>
                        <td>Tax:</td>
                        <td>{{ tax | currency }}</td>
                    </tr>
                    <tr class="has-text-weight-bold">
                        <td>Total:</td>
                        <td>{{ total | currency }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['subtotal', 'tax'],
        data() {
            return {}
        },
        computed: {
            total() {
                return this.subtotal + this.tax;
            }
        }
    }
</script>
