import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-header-bottom',
  standalone: true,
  imports: [],
  templateUrl: './header-bottom.component.html',
  styleUrl: './header-bottom.component.css',
})
export class HeaderBottomComponent {
  @Input() title: Array<{ title: string }> = [];
  // @Input() title2 = [];
}
