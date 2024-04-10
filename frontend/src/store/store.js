import { reactive } from 'vue'

export const store = reactive({
	count: 0,
	jsaId: 0,
	setFormId(value) {
		this.jsaId = value;
	}
})