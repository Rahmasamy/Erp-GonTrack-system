import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { CampgianService } from '../../servises/campgian.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-create-compgian',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './create-compgian.component.html',
  styleUrls: ['./create-compgian.component.css'],
})
export class CreateCompgianComponent implements OnInit {
  myForm: FormGroup;
  accountId: any = 0;
  constructor(
    private fb: FormBuilder,
    private route: ActivatedRoute,
    private compgianService: CampgianService
  ) {
    this.myForm = this.fb.group({
      campagian_name: ['', Validators.required],
      camp_date: ['', Validators.required],
      status: ['', Validators.required],
      acount_id: ['', Validators.required],
    });
    // console.log(route);
  }
  ngOnInit(): void {
    this.route.paramMap.subscribe((params) => {
      this.accountId = params.get('id');
      console.log('account ID:', this.accountId);

      // Set accountId into the form
      this.myForm.patchValue({ acount_id: this.accountId });
    });
  }

  onSubmit() {
    if (this.myForm.valid) {
      const formData = this.myForm.value;
      console.log('Form Submitted', formData);
      this.createCampaign(formData);
    } else {
      console.error('Form is invalid:', this.myForm.errors);
    }
  }

  createCampaign(data: any) {
    this.compgianService.createCampgian(data).subscribe(
      (response) => {
        console.log('Campaign created:', response);
      },
      (error) => {
        console.error('Error creating campaign:', error);
      }
    );
  }
}
