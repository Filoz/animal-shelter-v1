# Animal Shelter Manager
Animal Shelter Manager is a WordPress plugin built in a procedural fashion, where you can add Animals as a custom post, and each animal gets several taxonomies with separated custom metaboxes, an Archive status, a Last Adopted Widget, a shortcode, custom roles.

It's still a work in progress and done for an actual shelter (needs a custom child theme for showing the custom loop properly).
## Installation
Download by clicking Download Zip or cloning the repo 
```sh
$ git clone https://github.com/lucagentile/animal-shelter-v1.git
```
inside the `wp-contents\plugins` folder.
Then, just activate it.

## Features
- Animal Custom Post
- Taxonomies: 
    - Species, Sex, Breed, Age, Rehoming Status, Special Needs, Owner (useful if animals are owned by third-parties\organizations\privates
    - Custom metaboxes
    - Default terms for taxonomies
- Settings page
    - Here you can create not mandatory terms for Age taxonomy
- Archive Post Status (only for Animals)
    - Useful for keeping your past guests without deleting them, but not showing them in the main WP loop
    - You also get an "Archive" button near the Publish one. And the Publish one gets renamed "Republish" when post is actually Archived.
- "Last Adopted Animals" Widget
    - It shows animals that are Archived and Adopted (in rehoming status)
- Custom Roles only for animals
    -  Animal Author can add and edit own animals
    -  Shelter Author can add and edit own animals and articles
-  Shortcode
    -  You can show all your animals, or animals by species (so you can add different pages  for different species)
- Internationalized following the standards.
    - Already available in Italian.


#### Still to do
 - Shortcode frontend
 - "Delete eveything?" setting when unistalling


License
----
GPL-2.0+
http://www.gnu.org/licenses/gpl-2.0.txt
