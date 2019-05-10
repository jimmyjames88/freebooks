<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Expense</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th class="has-text-right">Amount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- display mode -->
                <tr v-for="(item, index) in lineItems" v-if="displayOnly">
                    <td>
                        {{ item.description }}
                    </td>
                    <td>
                        {{ item.price | currency }}
                    </td>
                    <td>
                        {{ item.tax | currency }}
                    </td>
                    <td class="has-text-right">
                        {{ item.price + item.tax | currency }}
                    </td>
                    <td></td>
                </tr>
                <!-- -->
                <tr v-for="(item, index) in lineItems" v-if="!displayOnly">

                    <td>
                        <input class="input" type="text" :name="'line_items[' + index + '][description]'" v-model="item.description" />
                    </td>
                    <td>
                        <input class="input quantity" type="number" :name="'line_items[' + index + '][price]'" v-model="item.price" />
                    </td>
                    <td>
                        <input class="input rate" type="text" :name="'line_items[' + index + '][tax]'" v-model="item.tax" />
                    </td>
                    <td class="has-text-right">
                        {{ item.price + item.tax | currency }}
                    </td>
                    <td>
                        <div>
                            <button
                                v-if="index == lineItems.length - 1"
                                @click="newLineItem"
                                class="button is-primary"
                                type="button">+</button>
                            <button
                                @click="removeLineItem(index)"
                                class="button is-danger"
                                type="button">-</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    import { LineItemMethods } from './LineItemMethods'

    export default {
        props: ['items', 'displayOnly'],
        data() {
            return {
                lineItems: [],
            }
        },
        mounted:LineItemMethods.mounted,
        methods: {
            newLineItem: LineItemMethods.newLineItem,
            removeLineItem: LineItemMethods.removeLineItem,
            formatCurrency: LineItemMethods.formatCurrency
        },
        computed: {
            subtotal() {
                let total = 0;
                this.lineItems.forEach(function(item){
                    if(item.quantity && item.rate)
                        total += (item.quantity * item.rate);
                });
                return total;
            },
            tax() {
                return this.subtotal * 0.05;
            },
            total() {
                return this.subtotal + this.tax;
            }
        },
    }
</script>
