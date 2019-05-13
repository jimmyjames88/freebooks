<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Rate</th>
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
                        {{ item.quantity }}
                    </td>
                    <td>
                        {{ item.rate | currency }}
                    </td>
                    <td class="has-text-right" colspan="2">
                        {{ item.rate * item.quantity | currency }}
                    </td>
                </tr>
                <!-- -->
                <tr v-for="(item, index) in lineItems" v-if="!displayOnly">

                    <td>
                        <input class="input" type="text" :name="'line_items[' + index + '][description]'" v-model="item.description" />
                    </td>
                    <td>
                        <input class="input quantity" type="number" :name="'line_items[' + index + '][quantity]'" v-model.number="item.quantity" />
                    </td>
                    <td>
                        <input class="input rate" type="text" :name="'line_items[' + index + '][rate]'" v-model.number="item.rate" @change="formatCurrency(index)" />
                    </td>
                    <td class="has-text-right">
                        {{ parseInt(item.rate) * parseInt(item.quantity) | currency }}
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
                this.lineItems.push({ description: null, quantity: null, rate: null })
        },

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
                        total += (Number(item.quantity) * Number(item.rate));
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
