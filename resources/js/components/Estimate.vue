<template>
    <div>
        <client-selector :clients="clients" :client="client" :required="1" v-if="!displayOnly"></client-selector>
        <line-items :display-only="displayOnly" :items="lineItems" @update="updateLineTotal"></line-items>
        <expense-items :display-only="displayOnly" :items="expenseItems" @update="updateExpenseTotal"></expense-items>
        <totals-table :tax="tax" :subtotal="subtotal"></totals-table>
    </div>
</template>

<script>

    import LineItems from './LineItems';
    import ClientSelector from './ClientSelector';
    import ExpenseItems from './ExpenseItems';
    import TotalsTable from './TotalsTable';

    export default {
        components: { LineItems, ClientSelector, ExpenseItems, TotalsTable },
        props: [ 'clients', 'client', 'displayOnly', 'lineItems', 'expenseItems' ],
        data() {
            return {
                lineTotal: 0,
                expenseTotal: 0
            }
        },
        computed: {
            tax() {
                return this.subtotal * 0.05;
            },
            subtotal() {
                return this.lineTotal + this.expenseTotal;
            }
        },
        methods: {
            updateLineTotal(x) {
                this.lineTotal = x;
            },
            updateExpenseTotal(x) {
                this.expenseTotal = x;
            }
        }
    }
</script>
