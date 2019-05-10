<template>
    <div>
        <div class="field">
            <label class="label">Bill to</label>
            <div class="control">
                <div class="select">
                    <select @change="selectClient" :required="required" ref="clientSelect">
                        <option></option>
                        <option v-for="(client, index) in clients" :key="client.id" :value="index">
                            {{ client.name }}
                        </option>
                    </select>
                    <input v-if="selected" type="hidden" name="client_id" v-model="selected.id" />
                </div>
            </div>
        </div>
        <fieldset v-if="selected">
            <p>{{ selected.name }}</p>
            <p>{{ selected.email }}</p>
            <p>
                <span>{{ selected.address.street }}</span>
                <br />
                <span>{{ selected.address.city }}, </span>
                <span>{{ selected.address.province }}</span>
                <span>{{ selected.address.postal }}</span>
            </p>
            <p>{{ selected.phone }}</p>
        </fieldset>
    </div>
</template>

<script>
    export default {
        props: ['clients', 'client', 'required'],
        data() {
            return {
                selected: null
            }
        },
        mounted() {

            let found = this.clients.map((e, i) => {
                if(e.id == this.client) {
                    this.selected = this.clients[i];
                    this.$refs.clientSelect.value = i;
                }
            });


        },
        methods: {
            selectClient(e) {
                this.selected = this.clients[e.target.value];
            }
        }
    }
</script>
