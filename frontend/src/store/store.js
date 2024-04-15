import { reactive } from 'vue'

export const store = reactive({
	count: 0,
	jsaId: 0,
	formView: 0,
	jsaForm: [],
	jsaHazards: [],
	jsaAssociates: [],
	jsaDepartments: [],
	setFormId(value) {
		this.jsaId = value;
	},
	setView(value) {
		this.formView = value;
	},
	setFormValue(value) {
		console.log(value);
		this.jsaForm = value;
	},
	setAssociateValue(value) {
		this.jsaAssociates = value
	},
	setDepartmentValue(value) {
		this.jsaDepartments = value
	},
	setHazardValue(value) {
		this.jsaHazards = value
	}
})