import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["menu", "overlay", "mobileMenuBtn"]
    static classes = ["open"]

    connect() {
        this.menuTarget.setAttribute("aria-hidden", "true")
        this.isOpen = false

        document.addEventListener("keydown", (e) => {
            if (e.key === "ESCAPE" && this.isOpen) {
                this.close()
            }
        })
    }

    toggle() {
        this.isOpen ? this.close() : this.open()
    }

    open() {
        this.menuTarget.classList.add("translate-y-0", "opacity-100")
        this.menuTarget.classList.remove("-translate-y-full", "opacity-0")
        this.overlayTarget.classList.remove("opacity-0")
        this.overlayTarget.classList.add("opacity-100")

        this.menuTarget.setAttribute("aria-hidden", "false")
        this.mobileMenuBtn.setAttribute("aria-expanded", "true")

        document.documentElement.style.overflow = "hidden"
        this.isOpen = true
    }

    close() {
        this.menuTarget.classList.add("-translate-y-full", "opacity-0")
        this.menuTarget.classList.remove("translate-y-0", "opacity-100")
        this.overlayTarget.classList.add("opacity-0")
        this.overlayTarget.classList.remove("opacity-100")

        this.menuTarget.setAttribute("aria-hidden", "true")
        this.mobileMenuBtn.setAttribute("aria-expanded", "false")

        document.documentElement.style.overflow = ""
        this.isOpen = false
    }

}
