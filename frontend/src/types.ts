export interface Associate {
  associateId: number
  associateName: string
  associateTitle: string
  supervisorRole: boolean
}
export interface Department {
  departmentID: number
  departmentName: String
  associateName: String
}
export interface Hazard {
  hazardsId: String
  hazards: String
  controls: String
}

export interface StepControl {
  stepDescription: String
  Hazard: String
  Control: String
}
