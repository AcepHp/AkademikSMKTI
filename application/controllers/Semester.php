<?php
class Semester extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Semester_model');
    }

    public function index()
    {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        $data['semesters'] = $this->Semester_model->get_all_semester();
        $this->load->view('admin/data_master/semester/data_semester', $data);
    }


    public function edit_semester($id)
    {
        if ($this->session->userdata('role') !== 'SuperAdmin' && $this->session->userdata('role') !== 'Admin' ) {
            redirect('auth');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'nama_semester' => $this->input->post('nama_semester'),
                'status' => $this->input->post('status')
            );

            // Jika status diubah menjadi Aktif, nonaktifkan semua semester yang aktif
            if ($data['status'] === 'Aktif') {
                $this->Semester_model->nonaktifkan_semua_semester();
            }

            if ($this->Semester_model->update_semester($id, $data)) {
                $this->session->set_flashdata("success_edit", "Tahun Akademik berhasil diedit!");
                redirect('semester');
            }
        }

        $data['semester'] = $this->Semester_model->get_semester_by_id($id);
        $this->load->view('admin/data_master/semester/edit_semester', $data);
    }
    

    
    

}