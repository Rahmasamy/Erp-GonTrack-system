import { Component } from '@angular/core';
import { AccountService } from '../../servises/account.service';
import { FormsModule } from '@angular/forms';
import { MatInputModule } from '@angular/material/input';
import { MatSelectModule } from '@angular/material/select';
import { MatFormFieldModule } from '@angular/material/form-field';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { ClientService } from '../../servises/client.service';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-create-account',
  standalone: true,
  imports: [
    ReactiveFormsModule,
    MatFormFieldModule,
    MatSelectModule,
    MatInputModule,
    FormsModule,
    CommonModule,
  ],
  templateUrl: './create-account.component.html',
  styleUrls: ['./create-account.component.css'],
})
export class CreateAccountComponent {
  myForm: FormGroup;
  data: any = [];

  constructor(
    private fb: FormBuilder,
    private accountService: AccountService,
    private clientService: ClientService
  ) {
    this.getAllAccounts();

    this.myForm = this.fb.group({
      account_name: ['', Validators.required],
      client_id: ['', [Validators.required]],
      status: ['', Validators.required],
    });
  }

  // onSubmit() {
  //   if (this.myForm.valid) {
  //     const clientId = parseInt(this.myForm.value.client_id, 10);
  //     console.log('Form Submitted', this.myForm.value);

  //     this.myForm.patchValue({ client_id: clientId });
  //     console.log(clientId);
  //     this.createAccount(this.myForm.value);
  //   }
  // }
  onSubmit() {
    if (this.myForm.valid) {
      // Convert client_id to a number
      console.log(this.myForm.value.client_id);
      const clientId = Number(this.myForm.value.client_id);

      // Create a new object to send
      const formData = {
        account_name: this.myForm.value.account_name,
        client_id: clientId, // Use the converted number
        status: this.myForm.value.status,
      };

      console.log('Form Submitted', formData);
      this.createAccount(formData);
    } else {
      console.error('Form is invalid:', this.myForm.errors);
    }
  }

  createAccount(data: any) {
    this.accountService.createAccout(data).subscribe(
      (response) => {
        console.log('Account created:', response);
      },
      (error) => {
        console.error('Error creating account:', error);
      }
    );
  }

  getAllAccounts() {
    this.clientService.getAllClients().subscribe(
      (response) => {
        console.log('Clients fetched:', response);
        this.data = response.data;
        console.log(response);
      },
      (err) => {
        console.error('Error fetching clients:', err);
      }
    );
  }
}
