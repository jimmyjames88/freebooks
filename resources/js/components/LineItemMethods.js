
    export const LineItemMethods = {

        newLineItem() {
            // add empty object to array to create a new line
            this.lineItems.push({});
        },

        removeLineItem(i) {

            // make sure there's atleast 1 line item always
            if(this.lineItems.length <= 1)
                return false;

            this.lineItems.splice(i, 1);

        },

        formatCurrency(index) {
            this.lineItems[index].rate = this.$options.filters.toCurrency(parseInt(this.lineItems[index].rate));
        },

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
        }
    }
