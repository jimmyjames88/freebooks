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
                        <input class="input quantity" type="number" :name="'line_items[' + index + '][quantity]'" v-model="item.quantity" />
                    </td>
                    <td>
                        <input class="input rate" type="text" :name="'line_items[' + index + '][rate]'" v-model="item.rate" @change="formatCurrency(index)" />
                    </td>
                    <td class="has-text-right">
                        {{ item.rate * item.quantity | currency }}
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
        
        <!-- slot for expense items -->
        <slot></slot>
        <!-- -->

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
