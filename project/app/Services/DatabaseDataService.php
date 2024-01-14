<?php

namespace App\Services;

use App\Models\City;
use App\Models\Admin;
use App\Models\State;
use App\Models\Doctor;
use App\Models\Ticket;
use App\Models\Hospital;
use App\Models\IpgModel;
use App\Models\IpgDevice;
use App\Models\LeadModel;
use App\Models\UserGender;
use App\Models\Distributor;
use App\Models\PatientInfo;
use App\Models\Implantation;
use App\Models\OldImplantation;
use App\Models\ImplantReplacement;
use App\Models\PatientRelativeInfo;
use App\Models\SalesRepresentative;
use App\Models\NewDeviceToDistributor;

class DatabaseDataService
{

  public function getGenders()
  {
    return UserGender::all();
  }
  public function getStates()
  {
    return State::orderBy('state_name', 'ASC')->get();
  }
  public function getState($state_id)
  {
    return State::where('state_id', $state_id)->first();
  }
  public function getCities()
  {
    return City::with('state')->get();
  }
  public function getCity($city_id)
  {
    return City::where('city_id', $city_id)->with('state')->first();
  }
  public function getCityByState($state_id)
  {
    return City::where('state_id', '=', $state_id)->orderBy('city_name', 'ASC')->get();
  }
  public function getPatientInfo($patient_id)
  {
    return PatientInfo::where('patient_info.patient_id', $patient_id)
      ->with('login_table')
      ->with('gender')
      ->with('state')
      ->with('relativeInfo.state')
      ->first();
  }
  public function getPatientRelativeInfo($patient_id)
  {
    return PatientRelativeInfo::where('patient_id', $patient_id)
      ->leftJoin('states', 'patients_immidiate_relative.state_id', '=', 'states.state_id')
      ->with('gender')
      ->first();
  }
  public function getPatients()
  {
    return PatientInfo::with('gender')->with('login_table');
  }
  public function getDistributor($distributor_id)
  {
    return Distributor::where('distributor_id', '=', $distributor_id)
      ->leftJoin('cities', 'distributors.distributor_city_id', '=', 'cities.city_id')
      ->leftJoin('states', 'cities.state_id', '=', 'states.state_id')
      ->first();
  }
  public function getDistributors()
  {
    return Distributor::leftJoin('cities', 'distributors.distributor_city_id', '=', 'cities.city_id')
      ->leftJoin('states', 'cities.state_id', '=', 'states.state_id')
      ->get();
  }
  public function getDistributorBySalesPerson($id)
  {
    return Distributor::leftJoin('cities', 'distributors.distributor_city_id', '=', 'cities.city_id')
      ->leftJoin('states', 'cities.state_id', '=', 'states.state_id')
      ->leftJoin('sales_representatives', 'sales_representatives.sales_person_id', '=', 'distributors.sales_person_id')
      ->where('sales_representatives.sales_person_id', $id)
      ->orWhere('sales_representatives.supervisor', $id)
      ->orWhere('sales_representatives.manager', $id)
      ->orWhere('sales_representatives.zonal_manager', $id)
      ->orWhere('sales_representatives.national_manager', $id)
      ->select('distributors.*')
      ->get();
  }
  public function getHospital($hospital_id)
  {
    return Hospital::where('hospital_id', '=', $hospital_id)
      ->leftJoin('cities', 'hospitals.city_id', '=', 'cities.city_id')
      ->leftJoin('states', 'cities.state_id', '=', 'states.state_id')
      ->leftJoin('engineers', 'hospitals.sales_person_id', '=', 'engineers.engineer_id')
      ->leftJoin('distributors', 'hospitals.distributor_id', '=', 'distributors.distributor_id')
      ->select('hospitals.*', 'cities.city_name', 'states.state_name', 'engineers.engineer_name', 'distributors.distributor_name')
      ->first();
  }
  public function getHospitals()
  {
    return Hospital::with('city.state')
      ->with('distributor')
      ->with('salesperson')
      ->get();
  }
  public function getHospitalByDistributor($distributor_id)
  {
    return Hospital::where('distributor_id', $distributor_id)
      ->orderBy('hospital_name', 'ASC')
      ->get();
  }
  public function getHospitalBySalesPerson($id)
  {

    // return $id;
    return Hospital::leftJoin('distributors', 'hospitals.distributor_id', '=', 'distributors.distributor_id')
      ->leftJoin('sales_representatives', 'sales_representatives.sales_person_id', '=', 'distributors.sales_person_id')
      ->where('sales_representatives.sales_person_id', $id)
      ->orWhere('sales_representatives.supervisor', $id)
      ->orWhere('sales_representatives.manager', $id)
      ->orWhere('sales_representatives.zonal_manager', $id)
      ->orWhere('sales_representatives.national_manager', $id)
      ->orderBy('hospital_name', 'ASC')
      ->get();
  }
  public function getDoctor($doctor_id)
  {
    return Doctor::where('doctor_id', '=', $doctor_id)->with('hospital.city.state')
      ->first();
  }
  public function getDoctorByHospital($hospital_id)
  {
    return Doctor::where('hospital_id', '=', $hospital_id)->with('hospital.city.state')
      ->get();
  }
  public function getDoctors()
  {
    return Doctor::with('hospital.city.state')->with('hospital.distributor')->get();
  }
  public function getDoctorBySalesPerson($id)
  {

    // return $id;
    return Doctor::leftJoin('hospitals', 'hospitals.hospital_id', '=', 'doctors.hospital_id')
      ->leftJoin('distributors', 'hospitals.distributor_id', '=', 'distributors.distributor_id')
      ->leftJoin('sales_representatives', 'sales_representatives.sales_person_id', '=', 'distributors.sales_person_id')
      ->where('sales_representatives.sales_person_id', $id)
      ->orWhere('sales_representatives.supervisor', $id)
      ->orWhere('sales_representatives.manager', $id)
      ->orWhere('sales_representatives.zonal_manager', $id)
      ->orWhere('sales_representatives.national_manager', $id)
      ->orderBy('hospital_name', 'ASC')
      ->get();
  }
  public function getTicket($ticket_number)
  {
    return Ticket::where('ticket_number', '=', $ticket_number)
      ->with('patientInfo.login_table')
      ->with('ticketType')
      ->with('ticketCurrentStatus')->with('ticketProcess.ticketTitle')->first();
  }
  public function getTickets()
  {
    return Ticket::with('patientInfo.login_table')
      ->with('ticketType')
      ->with('ticketCurrentStatus')
      ->with('ticketProcess.ticketTitle');
  }

  public function getImplantReplacement($ticket_number)
  {
    return ImplantReplacement::where('ticket_number', '=', $ticket_number)
      ->with('currentStatus')
      ->with('distributor.salesPerson')
      ->with('distributor.salesPerson.supervisorData')
      ->with('distributor.salesPerson.managerData')
      ->with('distributor.salesPerson.zonal_managerData')
      ->with('distributor.salesPerson.national_managerData')
      ->with('reason')
      ->with('ticket.patientInfo.login_table')
      ->with('doctor.hospital');
  }

  public function getImplantReplacements()
  {
    return ImplantReplacement::with('reason')
      ->with('currentStatus')
      ->with('distributor.salesPerson')
      ->with('distributor.salesPerson.supervisorData')
      ->with('distributor.salesPerson.managerData')
      ->with('distributor.salesPerson.zonal_managerData')
      ->with('distributor.salesPerson.national_managerData')
      ->with('ticket.patientInfo.login_table')
      ->with('doctor.hospital');
  }
  
  public function salesReps($id)
  {
    return SalesRepresentative::where('sales_person_id', $id)
     ->with('supervisorData')
      ->with('managerData')
      ->with('zonal_managerData')
      ->with('national_managerData')->first();
  }
  public function salesRepCC($id)
  {
    $data = $this->salesReps($id);
     $cc = [['email' => $data->email, 'name' => $data->name]];
      if (isset($data['supervisorData'])) {
        array_push($cc,['email' => $data['supervisorData']->email, 'name' => $data['supervisorData']->name]);
      }
      if (isset($data['managerData'])) {
        array_push($cc,['email' => $data['managerData']->email, 'name' => $data['managerData']->name]);
      }
      if (isset($data['zonal_managerData'])) {
        array_push($cc,['email' => $data['zonal_managerData']->email, 'name' => $data['zonal_managerData']->name]);
      }
      if (isset($data['national_managerData'])) {
        array_push($cc,['email' => $data['national_managerData']->email, 'name' => $data['national_managerData']->name]);
      }
     return $cc;
  }
  public function getImplantDetail()
  {
    return Implantation::with('patientInfo.login_table', 'patientInfo.gender', 'patientInfo.relativeInfo.gender')
      ->with('ticket.ticketCurrentStatus')
      ->with('implantType')
      ->with('distributor.city.state','distributor.salesPerson.supervisorData','distributor.salesPerson.managerData','distributor.salesPerson.zonal_managerData','distributor.salesPerson.national_managerData','distributor.salesPerson.zoneData')
      ->with('doctor.hospital.city.state')
      ->with('engineer')
      ->with('ipgSerial.ipgModel.ipgDevice.therapy')
      ->with('cspCatheter')
      ->with('lead1')
      ->with('lead2')
      ->with('lead3')
      ->with('extraLead');
  }
  public function getNewDeviceToDistributor($ticket_number)
  {
    return NewDeviceToDistributor::where('ticket_number', $ticket_number)
      ->with('ticket.ticketCurrentStatus')
      ->with('distributor.city.state')
      ->with('ipgSerial.ipgModel.ipgDevice.therapy')
      ->with('ipgModel.ipgDevice.therapy')
      ->with('cspCatheter')
      ->with('lead1')
      ->with('lead2')
      ->with('lead3')
      ->with('lead3')
      ->with('courier')
      ->first();
  }
  public function getOldImplantDetail()
  {
    return OldImplantation::with('patientInfo.login_table', 'patientInfo.gender', 'patientInfo.relativeInfo.gender')
      ->with('ticket.ticketCurrentStatus')
      ->with('distributor.city.state')
      ->with('doctor.hospital.city.state')
      ->with('engineer')
      ->with('salesPerson')
      ->with('ipgModel.ipgDevice.therapy')
      ->with('cspCatheter')
      ->with('lead1')
      ->with('lead2')
      ->with('lead3')
      ->with('extraLead');
  }

  public function getSalesPersons()
  {
    return SalesRepresentative::all();
  }

  public function getSalesPerson($admin_id)
  {
    return Admin::where('admin_type_id', 5)->where('admin_id', $admin_id)->first();
  }

  public function getIpgDevice($device_id)
  {
    return IpgDevice::where('id', '=', $device_id)->orderBy('id', 'ASC')
      ->with('lead1Type')
      ->with('lead2Type')
      ->with('lead3Type')
      ->first();
  }

  public function getIpgModel($model_number)
  {
    return IpgModel::where('model_number', '=', $model_number)
      ->with('ipgDevice.therapy')
      ->first();
  }

  public function getLeadModel($lead_type)
  {
    return LeadModel::where('lead_type', '=', $lead_type)->orderBy('model_name', 'ASC')->get();
  }

  public function getActiveLeadModel($lead_type)
  {
    return LeadModel::where('lead_type', '=', $lead_type)->where('is_active', 1)->orderBy('model_name', 'ASC')->get();
  }

  public function mrCompatible($implant_detail)
  {

    // dd($implant_detail);
    $ipg_model = IpgModel::where('model_number', '=', $implant_detail['ipgSerial']['ipg_model_number'])->get();
    $lead1_model = LeadModel::where('model_number', '=', $implant_detail->lead1_model_number)->get();
    $lead2_model = LeadModel::where('model_number', '=', $implant_detail->lead2_model_number)->get();
    $lead3_model = LeadModel::where('model_number', '=', $implant_detail->lead3_model_number)->get();
    $csp_lead_model = LeadModel::where('model_number', '=', $implant_detail->csp_lead_model)->get();

    if (count($lead1_model) == 0) {
      $mr_lead1 = 1;
    } else {
      $mr_lead1 = $lead1_model[0]->mr_enabled;
    }
    if (count($lead2_model) == 0) {
      $mr_lead2 = 1;
    } else {
      $mr_lead2 = $lead2_model[0]->mr_enabled;
    }
    if (count($lead3_model) == 0) {
      $mr_lead3 = 1;
    } else {
      $mr_lead3 = $lead3_model[0]->mr_enabled;
    }
    if (count($csp_lead_model) == 0) {
      $mr_csp_lead = 1;
    } else {
      $mr_csp_lead = $csp_lead_model[0]->mr_enabled;
    }
    if ($ipg_model[0]->mr_enabled == 0 || $mr_lead1 == 0 || $mr_lead2 == 0 || $mr_lead3 == 0 || $mr_csp_lead == 0) {
      return $mr_enabled = 0;
    } else {
      return $mr_enabled = 1;
    }
  }

  public function checkLifetime($valid_till, $date_of_implant)
  {
    $date_diff = date_diff(date_create($valid_till), date_create($date_of_implant))->format("%a");
    if ($date_diff > 54750) {
      return 1;
    } else {
      return 0;
    }
  }
}
