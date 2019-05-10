<template>
    <div>
        <client-selector :clients="clients" :client="client" :required="1" v-if="!displayOnly"></client-selector>
        <line-items :display-only="displayOnly" :items="lineItems"></line-items>
    </div>
</template>

<script>

    import LineItems from './LineItems';
    import ClientSelector from './ClientSelector';

    export default {
        components: { LineItems, ClientSelector },
        props: [ 'clients', 'client', 'displayOnly', 'lineItems' ],
        data() {
            return {


            }
        }
    }
</script>
