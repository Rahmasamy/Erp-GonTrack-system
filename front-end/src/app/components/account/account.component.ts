import { Component, OnInit } from '@angular/core';
import { RouterLink } from '@angular/router';
import { ChangeDetectionStrategy } from '@angular/core';
import { MatExpansionModule } from '@angular/material/expansion';
import { CommonModule } from '@angular/common';
import { AccountService } from '../../servises/account.service';
import { CampgianService } from '../../servises/campgian.service';
import { NgModel } from '@angular/forms';

@Component({
  selector: 'app-account',
  standalone: true,
  imports: [MatExpansionModule, RouterLink, CommonModule],
  templateUrl: './account.component.html',
  styleUrls: ['./account.component.css'],
  changeDetection: ChangeDetectionStrategy.Default,
})
export class AccountComponent implements OnInit {
  data: any[] = [];
  dataCampgian: any[] = [];
  expandedAccountId: boolean | null = false;

  constructor(
    private accountService: AccountService,
    private compgianService: CampgianService
  ) {}

  ngOnInit() {
    this.getAllAccounts();
    // this.onExpansionChange(this.expandedAccountId || 0);
  }

  getAllAccounts() {
    this.accountService.getAllAccounts().subscribe(
      (response) => {
        console.log('API Response:', response);
        this.data = response.data.data || [];
        this.dataCampgian = response.data.campgians;
        console.log(response.data.campgians);
        console.log('Fetched Data:', this.data);
        console.log('Data Length:', this.data.length);
      },
      (err) => {
        console.error('Error fetching accounts:', err);
      }
    );
  }

  // getAllCampgian(accountId: number) {
  //   this.compgianService.getAllCampgian(accountId).subscribe(
  //     (response) => {
  //       console.log('API Response:', response);
  //       this.dataCampgian = response.data || [];
  //       console.log('Fetched Data:', this.dataCampgian);
  //       console.log('Data Length:', this.dataCampgian.length);
  //     },
  //     (err) => {
  //       console.error('Error fetching campaigns:', err);
  //     }
  //   );
  // }

  onExpansionChange(accountId: number) {
    this.expandedAccountId = !this.expandedAccountId;
    // // Check if the current account is already expanded
    // if (this.expandedAccountId === accountId) {
    //   this.expandedAccountId = null; // Collapse the panel
    //   this.dataCampgian = []; // Clear the campaigns data when collapsed
    // } else {
    //   this.expandedAccountId = accountId; // Expand the new panel
    //   // this.getAllCampgian(accountId); // Fetch campaigns for the selected account

    // }
  }
}
