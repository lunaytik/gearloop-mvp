import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["collectionContainer"]

    static values = {
        index    : Number,
        prototype: String,
    }




     addTagFormDeleteLink(item) {
        const removeFormButton = document.createElement('button');
        removeFormButton.innerText = 'Delete this item';
        removeFormButton.classList.add('btn', 'btn-error', 'btn-sm');

        item.append(removeFormButton);

        removeFormButton.addEventListener('click', (e) => {
            e.preventDefault();
            // remove the li for the tag form
            item.remove();
        });
    }



    addCollectionElement(event)
    {
        const item = document.createElement('div');
        item.innerHTML = this.prototypeValue.replace(/__name__/g, this.indexValue);
        item.classList.add('flex', 'flex-col', 'gap-2', 'p-4', 'bg-base-200', 'border', 'border-base-300', 'rounded-field');
        this.collectionContainerTarget.appendChild(item);
        this.indexValue++;
        this.addTagFormDeleteLink(item);

    }

    connect()
    {
        document
            .querySelectorAll('div.kit-items > div')
            .forEach((tag) => {
                this.addTagFormDeleteLink(tag)
            })
    }

}
