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
                        {{ Number(item.price) + item.tax | currency }}
                    </td>
                    <td></td>
                </tr>
                <!-- -->
                <tr v-for="(item, index) in lineItems" v-if="!displayOnly">

                    <td>
                        <input class="input" type="text" :name="'line_items[' + index + '][description]'" v-model="item.description" />
                    </td>
                    <td>
                        <input class="input rate" type="text" :name="'line_items[' + index + '][price]'" v-model.number="item.price" @change="formatCurrency(index)" />
                    </td>
                    <td>
                        <input class="input rate" type="text" :name="'line_items[' + index + '][tax]'" v-model.number="item.tax" @change="formatCurrency(index)" />
                    </td>
                    <td class="has-text-right">
                        {{ parseInt(item.price) + parseInt(item.tax) | currency }}
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
        // mounted:LineItemMethods.mounted,
        mounted() {
            // create line item from props
            if(this.items)
                this.lineItems = this.items

            // initially format input values as currencies
            this.lineItems.forEach((item, i) => {
                this.lineItems[i].rate = this.$options.filters.toCurrency(item.rate);
            });

            // add lineItem if none
            if(!this.lineItems.length)
                this.lineItems.push({ description: null, price: null, tax: null })
        },
        methods: {
            newLineItem: LineItemMethods.newLineItem,
            removeLineItem: LineItemMethods.removeLineItem,
            // formatCurrency: LineItemMethods.formatCurrency
            formatCurrency(index) {
                this.lineItems[index].price = this.$options.filters.toCurrency(parseInt(this.lineItems[index].price));
                this.lineItems[index].tax = this.$options.filters.toCurrency(parseInt(this.lineItems[index].tax));
            },
        },
        computed: {
            subtotal() {
                let total = 0;
                this.lineItems.forEach(function(item){
                    if(item.price && item.tax)
                        total += (parseInt(item.price) + parseInt(item.tax));
                });
                return total;
            }
        },
        watch: {
            subtotal(amt) {
                this.$emit('update', amt);
            }
        }
    }
</script>
